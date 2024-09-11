<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Church;
use App\Http\Requests\ChurchRequest;

class ChurchController extends Controller
{
    public function index()
    {
        $churches = Church::all();

        return view('churches.index', compact('churches'));
    }

    public function create()
    {
        return view('churches.create');
    }

    public function store(ChurchRequest $request)
    {
        Church::create($request->validated());

        return redirect()->route('churches.index')->with('success', 'Church created successfully.');
    }

    public function update(ChurchRequest $request, Church $church)
    {
        $church->update($request->validated());

        return redirect()->route('churches.index')->with('success', 'Church updated successfully.');
    }

    public function destroy(Church $church)
    {
        $church->delete();
        return redirect()->route('churches.index')->with('success', 'Church deleted successfully.');
    }



}
