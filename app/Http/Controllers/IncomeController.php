<?php

namespace App\Http\Controllers;

use App\Models\Farmsetup;
use App\Models\Income;
use Illuminate\Http\Request;
use App\Models\Expense;

class IncomeController extends Controller
{

    public function show_finance_page()
    {
        return view('admin.finance');
    }
    public function add_income(Request $request)
    {
        $validatedData = $request->validate([
            'source_of_income' => 'nullable|string|max:255',
            'farm_income_belong' => 'nullable|string|max:255',
            'income_amount' => 'nullable|string|max:255',
            'income_date' => 'nullable|date',
        ]);

        $finance = new Income();
        $finance->source_of_income = $request->source_of_income;
        $finance->farm_income_belong = $request->farm_income_belong;
        $finance->income_amount = $request->income_amount;
        $finance->income_date = $request->income_date;

        $finance->save();

        return response()->json(['message' => 'Finance record added successfully']);
    }

    public function get_finance()
    {
        // Fetch farm items from the database
        $farmItems = Farmsetup::select('id', 'name_of_product')->get();

        // Return the items as a JSON response
        return response()->json(['farmItems' => $farmItems]);
    }

    public function getAnalytics()
    {
        // Calculate total income and expenses
        $totalIncome = Income::sum('income_amount');
        $totalExpenses = Expense::sum('expense_amount_spend');

        // Calculate net amount
        $netAmount = $totalIncome - $totalExpenses;

        // Return the response as JSON
        return response()->json([
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'netAmount' => $netAmount
        ]);
    }
}
