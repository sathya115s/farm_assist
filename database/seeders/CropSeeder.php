<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Crop;
class CropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Retrieve the JSON file from storage
            $json = Storage::disk('local')->get('json/crop.json');
            if ($json === false) {
                throw new \Exception('Failed to read JSON file');
            }

            // Decode JSON data
            $crops = json_decode($json, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Error decoding JSON: ' . json_last_error_msg());
            }

            // Iterate over each crop and update or create records
            foreach ($crops as $crop) {
                Crop::updateOrCreate(
                    [
                        'crop_name' => $crop['crop_name'],
                        'activity' => $crop['activity']
                    ],
                    [
                        'soil_type' => $crop['soil_type'],
                        'planting_type' => $crop['planting_type'],
                        'activity_start_days' => $crop['activity_start_days'],
                        'activity_end_days' => $crop['activity_end_days']
                    ]
                );
            }

            Log::info('Crop seeder ran successfully.');

        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            Log::error('Seeder Error: ' . $e->getMessage());
        }
    }
}
