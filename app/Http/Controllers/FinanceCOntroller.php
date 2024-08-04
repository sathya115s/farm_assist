<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmsetup;
use App\Models\Income;
use App\Models\Expense;

class FinanceController extends Controller
{
    
public function show_finance(){
    return view('admin.finance');
}


// FinanceController.php
public function getIncomeItems()
{
    $farmItems = Farmsetup::all(); // Adjust the model and query as needed
    return response()->json(['farmItems' => $farmItems]);
}

    public function getFinance()
    {
        $farmItems = Farmsetup::select('id', 'name_of_product')->get();

        // Return the items as a JSON response
        return response()->json(['farmItems' => $farmItems]);
    }

    public function addIncome(Request $request)
    {
        $income = new Income();
        $income->source_of_income = $request->input('source_of_income');
        $income->farm_income_belong = $request->input('farm_income_belong');
        $income->income_amount = $request->input('income_amount');
        $income->income_date = $request->input('income_date');
        $income->save();

        return response()->json(['message' => 'Income added successfully']);
    }

    public function addExpense(Request $request)
    {
        $expense = new Expense();
        $expense->type_expenses = $request->input('type_expenses');
        $expense->farm_expense_belongs = $request->input('farm_expense_belongs');
        $expense->expense_amount_spend = $request->input('expense_amount_spend');
        $expense->expense_date = $request->input('expense_date');
        $expense->save();

        return response()->json(['message' => 'Expense added successfully']);
    }

    public function addSetup(Request $request)
    {
        $farmItem = new Farmsetup();
        $farmItem->name_of_product = $request->input('product_name');
        $farmItem->save();

        return response()->json(['message' => 'Product added successfully']);
    }

    public function getAnalytics()
    {
        $totalIncome = Income::sum('income_amount');
        $totalExpenses = Expense::sum('expense_amount_spend');
        $netAmount = $totalIncome - $totalExpenses;

        return response()->json([
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'netAmount' => $netAmount,
        ]);
    }
}
