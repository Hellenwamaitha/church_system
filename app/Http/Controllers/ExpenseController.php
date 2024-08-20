<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        // Fetch expenses 
        $expenses = Expense::all();

        //  Categories
        $categories = ['Food', 'Transport', 'Utilities', 'Miscellaneous'];

        // Pass  to the view
        return view('expenses.index', compact('categories', 'expenses'));
    }


    public function store(Request $request)
    {
        // Validate the  data
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
            'document_path' => 'nullable|string',
        ]);

         // Handle file upload if present
        if ($request->hasFile('document')) {
        $documentPath = $request->file('document')->store('documents', 'public');
        } else {
        $documentPath = null;
          }
          
        // Create a new expense 
        $expense = new Expense();

        // Assign the request data to the expense 
        $expense->date = $request->date;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->category= $request->category;
        $expense->document_path = $request->document_path;

        // Save  expense to the database
        $expense->save();

        // Redirect back to  index page with a success message
        return redirect()->route('expenses.index')->with('success', 'Expense added successfully.');
    }
}

