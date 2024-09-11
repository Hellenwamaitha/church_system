<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Church;
use App\Http\Requests\BranchRequest;

class BranchController extends Controller
{

    /**
     * Display a listing of branches for a specific church.
     */
    public function index()
    {
        $branches = Branch::all();

        return view('branches.index', compact('branches'));
    }

    public function create()
    {
        return view('branches.create');
    }

    public function  store(BranchRequest $request)
    {
        Branch::create($request->validate());
        return redirect()->route('branches.index')
                     ->with('success', 'Branch created successfuly.');
    }

    public function update(BranchRequest $request ,Branch $branch)
    {
        $branch->update($request->validate());

        return redirect()->route('branches.index')
                         ->with('sucess', 'branch updated successfully');
    }
}
