<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    //
    public function insurance_show(){
        return view('admin.Insurance');
    }

    public function LivestocksInsurance_show(){
        return view('admin.LivestocksInsurance');
    }

    public function Livestocksinsurancelink_show(){
        return view('admin.Livestocksinsurancelink');
    }
}
