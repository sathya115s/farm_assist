<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livestock;

class LivestockController extends Controller
{
    
    public function show_livestock()
    {
        return view('admin.livestock');
    }


    public function add(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'color' => 'required|string',
            'feeding_time' => 'required',
            'gender' => 'required|in:male,female',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vaccinated' => 'required|in:yes,no',
            'prescription' => 'nullable|string', // Add this line
        ];

        if ($request->input('vaccinated') === 'yes') {
            $rules['vaccinated_date'] = 'required|date';
        }

        $validatedData = $request->validate($rules);

        // Store livestock data in the database
        $livestock = new Livestock(); // Ensure the class name is correct
        $livestock->name = $validatedData['name'];
        $livestock->birthdate = $validatedData['birthdate'];
        $livestock->color = $validatedData['color'];
        $livestock->feeding_time = $validatedData['feeding_time'];
        $livestock->gender = $validatedData['gender'];
        $livestock->vaccinated = $validatedData['vaccinated'];

        if ($validatedData['vaccinated'] === 'yes') {
            $livestock->vaccinated_date = $validatedData['vaccinated_date'];
        }

        // Handle prescription data
        if ($request->has('prescription')) {
            $livestock->prescription = $validatedData['prescription'];
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('livestock_animal_images'), $imageName);
            $livestock->image = 'livestock_animal_images/' . $imageName;
        }

        $livestock->save();

        return response()->json(['status' => 200, 'message' => 'Livestock added successfully']);
    }


    public function show()
    {
        $animals = Livestock::all();
        return response()->json(['animals' => $animals]);
    }



    public function edit($id)
    {
        $livestock = Livestock::findOrFail($id);
        return response()->json($livestock);
    }

    // Update a specific livestock entry
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'color' => 'required|string|max:7',
            'vaccinated' => 'required|string|in:yes,no',
            'vaccinated_date' => 'nullable|date',
            'feeding_time' => '|date_format:H:i',
            'gender' => 'required|string|in:male,female',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $livestock = Livestock::findOrFail($id);
        $livestock->name = $request->name;
        $livestock->birthdate = $request->birthdate;
        $livestock->color = $request->color;
        $livestock->vaccinated = $request->vaccinated;
        $livestock->vaccinated_date = $request->vaccinated_date;
        $livestock->feeding_time = $request->feeding_time;
        $livestock->gender = $request->gender;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $livestock->image = basename($imagePath);
        }

        $livestock->save();

        return response()->json(['message' => 'Livestock updated successfully']);
    }


    public function getDoctorInfo($id)
    {
        $animal = Livestock::find($id);
        return response()->json(['message' => 'fetched ', compact('animal')]);
    }
    public function save_doctor_info(Request $request, $id)
    {
        // Debugging: Log the ID being used
        \Log::info('Looking for livestock with ID: ' . $id);

        // Fetch the livestock record based on the ID
        $livestock = Livestock::find($id);

        // Check if the record exists
        if (!$livestock) {
            return response()->json(['error' => 'Livestock record not found'], 404);
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'doctor_name' => 'nullable|string|max:255',
            'prescription' => 'nullable|string',
        ]);

        // Update the livestock record with new data if provided
        if ($request->has('doctor_name')) {
            $livestock->doctor_name = $request->input('doctor_name');
        }

        if ($request->has('prescription')) {
            $livestock->prescription = $request->input('prescription');
        }

        // Save changes to the database
        $livestock->save();

        // Return the updated data as JSON
        return response()->json([
            'doctor_name' => $livestock->doctor_name,
            'prescription' => $livestock->prescription
        ]);
    }

    public function showReport($id)
    {
        // Find the report by ID
        $report = Livestock::find($id);

        if ($report) {
            // Check if the prescription is available
            if ($report->prescription) {
                // Return the prescription content if available
                return response()->json([
                    'content' => $report->prescription,
                    'data' => 'Doctor report fetched successfully'
                ]);
            } else {
                // Return a message indicating no prescription is available
                return response()->json([
                    'message' => 'Prescription is not available for this report.',
                ]);
            }
        } else {
            // Return an error if the report is not found
            return response()->json(['error' => 'Report not found'], 404);
        }
    }


}
