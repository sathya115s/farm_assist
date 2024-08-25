<?php

namespace App\Http\Controllers;

use App\Models\Cropdata;
use Illuminate\Http\Request;

class CropdataController extends Controller
{

    public function showcrop()
    {
        return view('admin.crops');
    }
    public function addActivity(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'crop' => 'required|string',
            'activity' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'type_of_planting' => 'required|string',
            'growth_period' => 'required|string',
            'soil_type' => 'required|string',
        ]);

        // Create a new SoybeanActivity instance
        $activity = new Cropdata();
        $activity->crop = $validatedData['crop'];
        $activity->activity = $validatedData['activity'];
        $activity->start_date = $validatedData['start_date'];
        $activity->end_date = $validatedData['end_date'];
        $activity->type_of_planting = $validatedData['type_of_planting'];
        $activity->growth_period = $validatedData['growth_period'];
        $activity->soil_type = $validatedData['soil_type'];
        $activity->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Soybean activity added successfully']);
    }
}