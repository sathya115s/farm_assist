<?php

namespace App\Http\Controllers;

use App\Models\Livetock;
use Illuminate\Http\Request;

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
        $livestock = new Livetock(); // Ensure the class name is correct
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
        $animals = Livetock::all();
        return response()->json(['animals' => $animals]);
    }

//     public function show($id)
// {
//     $livestock = Livetock::findOrFail($id);
//     return response()->json($livestock);
// }


public function edit($id)
{
    $livestock = Livetock::findOrFail($id);
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
        'prescription' => 'nullable|string',
    ]);

    $livestock = Livetock::findOrFail($id);
    $livestock->name = $request->name;
    $livestock->birthdate = $request->birthdate;
    $livestock->color = $request->color;
    $livestock->vaccinated = $request->vaccinated;
    $livestock->vaccinated_date = $request->vaccinated_date;
    $livestock->feeding_time = $request->feeding_time;
    $livestock->gender = $request->gender;
    $livestock->prescription = $request->prescription;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images');
        $livestock->image = basename($imagePath);
    }

    $livestock->save();

    return response()->json(['message' => 'Livestock updated successfully']);
}
}
