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
        ];
    
        if ($request->input('vaccinated') === 'yes') {
            $rules['vaccinated_date'] = 'required|date';
        }
    
        $validatedData = $request->validate($rules);
    
        // Store livestock data in the database
        $livestock = new Livetock();
        $livestock->name = $validatedData['name'];
        $livestock->birthdate = $validatedData['birthdate'];
        $livestock->color = $validatedData['color'];
        $livestock->feeding_time = $validatedData['feeding_time'];
        $livestock->gender = $validatedData['gender'];
        $livestock->vaccinated = $validatedData['vaccinated'];
    
        if ($validatedData['vaccinated'] === 'yes') {
            $livestock->vaccinated_date = $validatedData['vaccinated_date'];
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
        $show = Livetock::all();
        return response()->json([
            'success' => true,
            'messgae' => 'categroy fetched ',
            'show' => $show,
        ]);
    }
}
