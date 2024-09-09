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
        try {
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

            // Create a new Cropdata instance
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
            return response()->json(['message' => 'Crop activity added successfully']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }

    public function getcropactivity()
    {
        try {
            $getcropactivity = Cropdata::all();
            return response()->json($getcropactivity);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }

    public function getCropActivities($crop)
    {
        try {
            // Fetch crop activities based on the crop name
            $activities = Cropdata::where('crop', $crop)->get();

            if ($activities->isEmpty()) {
                return response()->json(['message' => 'No activities found for this crop'], 404);
            }

            return response()->json($activities, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }

    public function getPlantingTypes()
    {
        try {
            $plantingTypes = Cropdata::distinct('type_of_planting')->pluck('type_of_planting');
            return response()->json($plantingTypes);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }

    public function getSoilTypes()
    {
        try {
            $soilTypes = Cropdata::distinct('soil_type')->pluck('soil_type');
            return response()->json($soilTypes);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }

    public function getsoiltype($crop)
    {
        try {
            // Fetch soil types based on the selected crop
            $soilTypes = Cropdata::where('crop', $crop)->distinct()->pluck('soil_type');

            // Return a JSON response
            return response()->json([
                'message' => 'Soil types fetched according to the crop you have selected',
                'soilTypes' => $soilTypes
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }

    public function getplanting($crop)
    {
        try {
            // Fetch planting types based on the selected crop
            $plantingTypes = Cropdata::where('crop', $crop)->distinct()->pluck('type_of_planting');

            // Return a JSON response
            return response()->json([
                'message' => 'Planting types fetched according to the crop you have selected',
                'plantingTypes' => $plantingTypes
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }

}