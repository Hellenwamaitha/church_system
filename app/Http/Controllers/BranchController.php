<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Church;
use App\Http\Requests\BranchRequest;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    
     // Display a listing of branches for a specific church.
     
    public function index($churchId)
    {
        //eager load
        $branches = Branch::with('branches')->findorfail($churchId);

        return view('branches.index', compact('church'));
    }

    // A create form for the branch
    public function create($churchId)
    {
        $church = Church::findorfail($churchId);
        return view('branches.create', compact('church'));
    }

// Store a newly created branch with the churchid in the database
    public function store(BranchRequest $request, $churchId)
    {
        $church = Church::findOrFail($churchId);
        // Create branch for the specific church
        $church->branches()->create($request->all()); 

        return redirect()->route('churches.branches.index', $churchId)
                         ->with('success', 'Branch created successfully.');
    }
    

    // Editting form the branch
    public function edit($churchId, Branch $branch)
    {
        // Ensure the branch you editting belongs to the church
        $church = Church::findOrFail($churchId); 
        return view('branches.edit', compact('branch', 'church'));
    }

     // update a specified branch from the database

    public function update(BranchRequest $request, $churchId, Branch $branch)
    {
        //  validated data from BranchRequest
        $branch->update($request->validated()); 

        return redirect()->route('churches.branches.index', $churchId)
                         ->with('success', 'Branch updated successfully.');
    }
}
