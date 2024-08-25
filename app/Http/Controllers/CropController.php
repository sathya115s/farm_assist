<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Cropactivities;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function showcrop(){
        return view('admin.crops');
    }
    public function getOnionData()
    {
        $data = [
            'onion' => [
                'planting_period' => [
                    'start_month' => 'March',
                    'end_month' => 'April',
                    'duration_months' => $this->calculateMonths('March', 'April')
                ],
                'harvesting_period' => [
                    'start_month' => 'July',
                    'end_month' => 'August',
                    'duration_months' => $this->calculateMonths('July', 'August')
                ]
            ]
        ];

        return response()->json($data);
    }

    private function calculateMonths($startMonth, $endMonth)
    {
        $months = [
            'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,
            'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8,
            'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
        ];

        $start = $months[$startMonth];
        $end = $months[$endMonth];

        return ($end >= $start) ? ($end - $start + 1) : (12 - $start + $end + 1);
    }

    public function getCrops()
    {
        // Assuming you have a Crop model to fetch data
        $crops = Crop::all(); // Adjust this query based on your actual data structure
        return response()->json($crops);
    }

    // Fetch activities for a selected crop
    public function getActivitiesForCrop($cropName)
    {
        // Fetch activities based on crop name
        // Adjust this query based on your data structure
        $crop = Crop::where('crop_name', $cropName)->first();
        if (!$crop) {
            return response()->json(['message' => 'Crop not found'], 404);
        }

        $activities = $crop->activities; // Assuming 'activities' is a relationship or attribute
        return response()->json($activities);
    }

    // Fetch activity schedule based on all selections
    public function getActivitySchedule($cropName, $soilType, $plantingType)
    {
        // Adjust this query based on your data structure
        $crop = Crop::where('crop_name', $cropName)
                    ->where('soil_type', $soilType)
                    ->where('planting_type', $plantingType)
                    ->first();

        if (!$crop) {
            return response()->json(['message' => 'Crop not found'], 404);
        }

        $activities = $crop->activities; // Fetch the activities based on your data structure
        return response()->json($activities);
    }
}
