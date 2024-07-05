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
        // Fetch activities for a specific crop
        $cropActivities = Cropactivities::find($crop);

        return response()->json($cropActivities);
    }
}
