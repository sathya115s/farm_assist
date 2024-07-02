<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancalController extends Controller
{
    public function financial(){
        return view('admin.financal');

    }
    public function income(){
        return view('admin.income');
    }
}
