<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetItem;

class BudgetController extends Controller

{
   // Display a list of budget items
    public function index()
    {
        $budgetItems = BudgetItem::all();
        return view('budget.index', compact('budgetItems'));
    }

    // Display the form for creating a new budget item
    public function create()
    {
        return view('budget.create');
    }

    // Store a newly created budget item in database
    public function store(Request $request)
    {
       

        BudgetItem::create($request->all());

        return redirect()->route('budget.index');
    }

    
    public function edit($id)
    {
        // Show the form for editing the specified budget item
        $budgetItem = BudgetItem::findOrFail($id);
        return view('resources.edit', compact('budgetItem'));
    }

    // Update the specified budget item in the database
    public function update(Request $request, BudgetItem $budgetItem)
{
    //Validate updated data
    $request->validate([
        'category' => 'required|string|max:255',
        'amount_allocated' => 'required|numeric',
        'additional_notes' => 'nullable|string',
    ]);

    $budgetItem->update($request->all());

    return redirect()->route('budget.index')->with('success', 'Budget item updated successfully.');
}


    // Remove the specified budget item from storage using the id
    public function destroy($id)
    {
        $budgetItem = BudgetItem::findOrFail($id);
        $budgetItem->delete();

        return redirect()->route('budget.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Search query based on 'category' exact match
        $budgetItems = BudgetItem::where('category', 'LIKE', "%$search%")
                                ->get();

        return view('budget.index', compact('budgetItems'));
    }
}

