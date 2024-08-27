<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;
use App\Http\Requests\FinanceRequest;

use DateTime;
use DateInterval;
use DatePeriod;


class FinanceController extends Controller
{
    // Display the finance
    public function dashboard()

    {
        return view('finance.dashboard');
    }



    public function showImportForm()
    {
        return view('offeringtithes.import');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new UsersImport, $file);

        return back()->with('success', 'Users imported successfully.');
    }


     // Display the offerings and tithes
    public function index()
    {
        $offerings = Money::where('type', 'offering')->get();
        $tithes = Money::where('type', 'tithe')->get();

        return view('offeringtithes.index', [
            'offerings' => $offerings,
            'tithes' => $tithes,
        ]);
    }


   // Creating data 
    public function store(Request $request)
{
    //Validate incoming data
    $request->validate([
        'date' => 'required|date',
        'type' => 'required|in:offering,tithe',
        'amount' => 'required|numeric',
    ]);

    Money::create($request->all());

    return redirect()->route('offeringtithes.index')->with('success', 'Money record created successfully.');
}



}

