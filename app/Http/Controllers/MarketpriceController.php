<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketpriceController extends Controller
{
    public function market_price(){
        return view('admin.marketprice');
    }
}
