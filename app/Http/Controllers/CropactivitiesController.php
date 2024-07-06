<?php

namespace App\Http\Controllers;

use App\Models\Cropactivities;
use Illuminate\Http\Request;

class CropactivitiesController extends Controller
{
    public function getcropactivity(){
        $getcropactivity=Cropactivities::all();
        return response()->json($getcropactivity);
    }

    public function getCropActivities($crop)
    {
        // Fetch crop activities based on the crop name
        $activities = Cropactivities::where('crop', $crop)->get();

        if ($activities->isEmpty()) {
            return response()->json(['message' => 'No activities found for this crop'], 404);
        }

        return response()->json($activities, 200);
    }
}
