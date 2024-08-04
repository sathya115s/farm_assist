<?php

namespace App\Http\Controllers;

use App\Models\Farmsetup;
use Illuminate\Http\Request;

class FarmsetupController extends Controller
{
    public function addFarmSetup(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
        ]);

        // Create a new FarmProduct entry
        $farmProduct = new Farmsetup();
        $farmProduct->name_of_product = $request->input('product_name');
        $farmProduct->save();

        return response()->json(['success' => true, 'message' => 'Product added successfully!']);
    }
}
