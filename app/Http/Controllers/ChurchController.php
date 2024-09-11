<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Church;
use App\Http\Requests\ChurchRequest;

class ChurchController extends Controller
{
    // Display a listing of churches.
    public function index()
    {
        // Eager load branches
        $churches = Church::with('branches')->get(); 
        return view('churches.index', compact('churches'));
    }

    // Form for creating a new church
    public function create()
    {
        return view('churches.create');
    }

    // Store newly created church in the database
    public function store(ChurchRequest $request)
    {
        Church::create($request->validated());

        return redirect()->route('churches.index')->with('success', 'Church created successfully.');
    }

    // Display specified church along with its branches 
    public function show($id)
    {
        $church = Church::with('branches')->findorfail($id);
        return view('churches.show', compact('church'));
    }
    

    // form for editing a specified church
    public function edit($id)
    {
        $church = Church::findorfail($id);
        return view('churches.edit', compact('church'));
    }

    // Updating the specified church in the database.
    public function update(ChurchRequest $request, $id)
    {
        $church = Church::findorfail($id);
        $church->update($request->validated());

        return redirect()->route('churches.index')->with('success', 'Church updated successfully.');
    }

    // Remove the specified church from the database
    public function destroy($id)
    {
        $church = Church::findorfail($id);
        $church->delete();
        return redirect()->route('churches.index')->with('success', 'Church deleted successfully.');
    }



}
