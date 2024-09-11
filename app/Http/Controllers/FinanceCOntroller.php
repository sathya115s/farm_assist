<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmsetup;
use App\Models\Income;
use App\Models\Expense;

class FinanceController extends Controller
{

    public function show_finance()
    {
        return view('admin.finance');
    }


    
public function getFinance()
{
    try {
        $farmItems = Farmsetup::select('id', 'name_of_product')->get();
        return response()->json([
            'success' => true,
            'message' => 'Farm finance items fetched successfully.',
            'farmItems' => $farmItems
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while fetching farm finance items.',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function addIncome(Request $request)
{
    try {
        $validated = $request->validate([
            'source_of_income' => 'required|string',
            'farm_income_belong' => 'required|string',
            'income_amount' => 'required|numeric',
            'income_date' => 'required|date',
        ]);

        $income = new Income();
        $income->source_of_income = $request->input('source_of_income');
        $income->farm_income_belong = $request->input('farm_income_belong');
        $income->income_amount = $request->input('income_amount');
        $income->income_date = $request->input('income_date');
        $income->save();

        return response()->json([
            'success' => true,
            'message' => 'Income added successfully.',
            'data' => [
                'income' => $income
            ]
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred while adding income.',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function addExpense(Request $request)
{
    try {
        $validated = $request->validate([
            'type_expenses' => 'required|string',
            'farm_expense_belongs' => 'required|string',
            'expense_amount_spend' => 'required|numeric',
            'expense_date' => 'required|date',
        ]);

        $expense = new Expense();
        $expense->type_expenses = $request->input('type_expenses');
        $expense->farm_expense_belongs = $request->input('farm_expense_belongs');
        $expense->expense_amount_spend = $request->input('expense_amount_spend');
        $expense->expense_date = $request->input('expense_date');
        $expense->save();

        return response()->json([
            'success' => true,
            'message' => 'Expense added successfully.',
            'data' => [
                'expense' => $expense
            ]
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred while adding expense.',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function addSetup(Request $request)
{
    try {
        $validated = $request->validate([
            'product_name' => 'required|string',
        ]);

        $farmItem = new Farmsetup();
        $farmItem->name_of_product = $request->input('product_name');
        $farmItem->save();

        return response()->json([
            'success' => true,
            'message' => 'Product added successfully.',
            'data' => [
                'product' => $farmItem
            ]
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred while adding product.',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function getAnalytics(Request $request)
{
    try {
        $date = $request->input('date', date('Y-m-d'));

        $todayIncome = Income::whereDate('income_date', $date)->sum('income_amount');
        $todayExpenses = Expense::whereDate('expense_date', $date)->sum('expense_amount_spend');
        $netAmount = $todayIncome - $todayExpenses;

        return response()->json([
            'success' => true,
            'message' => 'Analytics data fetched successfully.',
            'totalIncome' => $todayIncome,
            'totalExpenses' => $todayExpenses,
            'netAmount' => $netAmount,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while fetching analytics data.',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function getfarmsetup() {
    try {
        $getfarmsetup = Farmsetup::all();
        
        if (!$getfarmsetup->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Farm setup data fetched successfully.',
                'data' => $getfarmsetup
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'No farm setup data found.',
                'data' => []
            ]);
        }
    } catch (\Exception $e) {
        \Log::error('Error fetching farm setup: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Failed to fetch farm setup. Please try again later.',
            'error' => $e->getMessage()
        ], 500);
    }
}


}
