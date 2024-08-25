<?php

namespace Database\Seeders;

use App\Models\Cropactivities;
use App\Models\Cropdata;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CropActivitySeeder extends Seeder
{
    public function run()
    {
        try {
            $json = Storage::disk('local')->get('/json/crop-data.json');
            if ($json === false) {
                throw new \Exception('Failed to read JSON file');
            }

            $cropactivities = json_decode($json, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Error decoding JSON: ' . json_last_error_msg());
            }

            // Proceed with your updateOrCreate logic here
            foreach ($cropactivities as $cropactivity) {
                Cropdata::updateOrCreate(
                    [
                        'crop' => $cropactivity['crop'],
                        'activity' => $cropactivity['activity']
                    ],
                    [
                        'start_date' => $cropactivity['start_date'],
                        'end_date' => $cropactivity['end_date'],
                        'type_of_planting' => $cropactivity['type_of_planting'],
                        'growth_period' => $cropactivity['growth_period'],
                        'soil_type' => $cropactivity['soil_type']
                    ]
                );
            }

        } catch (\Exception $e) {
            // Handle or log the exception
            echo 'Error: ' . $e->getMessage();
        }
    }
}
