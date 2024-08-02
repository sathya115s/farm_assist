<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceCOntroller extends Controller
{
    public function show_finance_page(){
        return view('admin.finance');
    }
}
