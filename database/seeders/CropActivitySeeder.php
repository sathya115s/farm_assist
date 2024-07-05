<?php

namespace Database\Seeders;

use App\Models\Cropactivities;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\CropActivity; // Ensure you have the correct model namespace

class CropActivitySeeder extends Seeder
{
    public function run()
{
    try {
        $json = Storage::disk('local')->get('/json/cropdata.json');
        if ($json === false) {
            throw new \Exception('Failed to read JSON file');
        }

        $cropactivities = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Error decoding JSON: ' . json_last_error_msg());
        }

        // Proceed with your updateOrCreate logic here
        foreach ($cropactivities as $cropactivity) {
            Cropactivities::updateOrCreate(
                [
                    'crop' => $cropactivity['crop'],
                    'activity' => $cropactivity['activity']
                ],
                [
                    'start_date' => $cropactivity['start_date'],
                    'end_date' => $cropactivity['end_date']
                ]
            );
        }

    } catch (\Exception $e) {
        // Handle or log the exception
        echo 'Error: ' . $e->getMessage();
    }
}

}
