<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function show_insurance(){
        return view('admin.insurance');
    }
}
