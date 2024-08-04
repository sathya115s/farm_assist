<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Farmsetup;

class ExpenseController extends Controller
{
    public function addExpense(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'type_expenses' => 'nullable|string|max:255',
            'farm_expense_belongs' => 'nullable|string|max:255',
            'expense_amount_spend' => 'nullable|numeric',
            'expense_spend' => 'nullable|string|max:255',
            'expense_date' => 'nullable|date',
        ]);

        // Create a new expense record
        $expense = new Expense();
        $expense->type_expenses = $request->type_expenses;
        $expense->farm_expense_belongs = $request->farm_expense_belongs;
        $expense->expense_amount_spend = $request->expense_amount_spend;
        $expense->expense_spend = $request->expense_spend;
        $expense->expense_date = $request->expense_date;
        $expense->save();

        // Return a success response
        return response()->json(['message' => 'Expense record added successfully']);
    }

    public function get_finance()
    {
        // Fetch farm items from the database
        $farmItems = Farmsetup::select('id', 'name_of_product')->get();

        // Return the items as a JSON response
        return response()->json(['farmItems' => $farmItems]);
    }
}
