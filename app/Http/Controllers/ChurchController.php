<?php

namespace App\Http\Controllers;


use App\Models\Church;
use App\Models\User;
use App\Models\Branch;
use App\Http\Requests\ChurchRequest;
use illumiinate\support\facedes\Hash;

class ChurchController extends Controller
{
    public function create()
    {
        return view('churches.create');
    }

    public function store(ChurchRequest $request)
    {
        // Store Church
        $validatedData = $request->validated();
        $validatedData['status'] = 'pending'; 
    
        $church = Church::create($validatedData);

        // Store Branches and their Pastors
        foreach ($request->branches as $branchData) {
            $branch = Branch::create([
                'church_id' => $church->id,
                'branch_name' => $branchData['branch_name'],
                'pastor_name' => $branchData['pastor_name'],
                'pastor_email' => $branchData['pastor_email'],
            ]);
            $branchData['status'] = 'pending';

            // Create Branch Pastor as the first user
            User::create([
                'name' => $branchData['pastor_name'],
                'email' => $branchData['pastor_email'],
                'password' => Hash::make($request->password),
                'role' => 'pastor',
                'branch_id' => $branch->id,
            ]);
        }

        return redirect()->route('login')->with('success', 'Church and Branches created successfully.');
    }
}