<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResourceAllocation;

class ResourceAllocationController extends Controller
{

    public function create()
    {
    return view('budget.create');
    }

    public function index()
    {
        $budgetItems = BudgetItem::all();
        return view('budget.index', compact('budgetItems'));
    }



    public function store(Request $request)
    {
        // Validate request data

        BudgetItem::create($request->all());

        return redirect()->route('budget.index');
    }

    public function edit($id)
    {
        $budgetItem = BudgetItem::findOrFail($id);
        return view('budget.edit', compact('budgetItem'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data

        $budgetItem = BudgetItem::findOrFail($id);
        $budgetItem->update($request->all());

        return redirect()->route('budget.index');
    }

    public function destroy($id)
    {
        $budgetItem = BudgetItem::findOrFail($id);
        $budgetItem->delete();

        return redirect()->route('budget.index');
    }
}
