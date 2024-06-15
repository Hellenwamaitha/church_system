<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accountusers;
use Illuminate\Support\Facades\Hash;

class AccountusersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountusers = Accountusers::all(); // Fetch all users

        return view('users.index', compact('accountusers')); // Pass $accountusers to the view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'role' => 'required|in:admin,finance_officer',
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Hash the password
    $hashedPassword = Hash::make($request->password);

    // Create the new user
    $user = Accountusers::create([
        'role' => $request->role,
        'name' => $request->name,
        'email' => $request->email,
        'password' => $hashedPassword,
    ]);

    // Return a success message
    return redirect()->route('users.index')->with('success', 'User created successfully!');
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Accountusers::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:accountusers,email,' . $id,
            'password' => 'required|min:8',
        ]);

        // Find the user by ID
        $user = Accountusers::findOrFail($id);

        // Update the user
        $user->update($request->all());

        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the user by ID and delete
        $user = Accountusers::findOrFail($id);
        $user->delete();

        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Perform the search query
        $accountUsers = AccountUsers::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");

        })->get();

        return view('users.index', ['accountUsers' => $accountUsers]);
    }
}
