<?php

namespace App\Http\Controllers;

use App\Models\Contribution;

use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function index()
    {
        $contribution = Contribution::with('branch')
                ->orderBy('date', 'desc')
                ->get();

        return view('contributions.index', compact('contributions'));        
    }

    public function create()
    {
        $branches = Branch::all();
        return view('contributions.create', compact('branches'));
    }

    
}
