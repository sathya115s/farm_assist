<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function show_weather_page(){
        return view('admin.weather');
    }
}
