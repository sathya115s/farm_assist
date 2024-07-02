<?php

namespace App\Http\Controllers;

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
}
