<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivestocksInsuranceController extends Controller
{
    //
    public function LivestocksInsurance_show(){
        return view('admin.LivestocksInsurance');
    }
}