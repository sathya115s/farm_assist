<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgricultureController extends Controller
{
    public function agriculture(){
        return view('admin.agriculturla_practice');
    }
}
