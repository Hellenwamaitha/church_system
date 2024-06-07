<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinancialReport;
use Carbon\Carbon;

class FinancialReportController extends Controller
{
    /**
     * Display a listing of the financial reports.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all financial reports
        $financialReports = FinancialReport::all();

        // Calculate the total offerings and tithes
        $totalOfferings = $financialReports->sum('total_offerings');
        $totalTithes = $financialReports->sum('total_tithes');
        $totalIncome = $financialReports->sum('total_income');


        // Return a view with the financial reports and totals
        return view('financialreport.index', compact('financialReports', 'totalOfferings', 'totalTithes', 'totalIncome',));
    }

    /**
     * Show the form for creating a new financial report.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created financial report in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'total_offerings' => 'required|numeric',
            'total_tithes' => 'required|numeric',
            'total_income' => 'required|numeric',

        ]);

        // Create a new financial report instance and fill it with validated data
        $financialReport = new FinancialReport();
        $financialReport->total_offerings = $request->input('total_offerings');
        $financialReport->total_tithes = $request->input('total_tithes');
        $financialReport->total_income = $request->input('total_income');

        // Save the financial report to the database
        $financialReport->save();

        // Redirect back with a success message
        return redirect()->route('financialreport.index')->with('success', 'Financial report added successfully.');
    }

    /**
     * Display the specified financial report.
     *
     * @param  \App\Models\FinancialReport  $financialReport
     * @return \Illuminate\Http\Response
     */
    // public function show(FinancialReport $financialReport)
    // {
    //     return view('financialreport.show', compact('financialReport'));
    // }

    /**
     * Show the form for editing the specified financial report.
     *
     * @param  \App\Models\FinancialReport  $financialReport
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancialReport $financialReport)
    {
        return view('financialreport.edit', compact('financialReport'));
    }

    /**
     * Update the specified financial report in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinancialReport  $financialReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinancialReport $financialReport)
    {
        // Validate the incoming request data
        $request->validate([
            'total_offerings' => 'required|numeric',
            'total_tithes' => 'required|numeric',
            'total_income' => 'required|numeric',

        ]);

        // Update the financial report with validated data
        $financialReport->update($request->all());

        // Redirect back with a success message
        return redirect()->route('financialreport.index')->with('success', 'Financial report updated successfully.');
    }

    /**
     * Remove the specified financial report from storage.
     *
     * @param  \App\Models\FinancialReport  $financialReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinancialReport $financialReport)
    {
        $financialReport->delete();

        // Redirect back with a success message
        return redirect()->route('financialreport.index')->with('success', 'Financial report deleted successfully.');
    }

    public function filter(Request $request)
    {
        $period = $request->get('period');
        $startDate = null;
        $endDate = Carbon::now();

        switch ($period) {
            case 'quarterly':
                $startDate = $endDate->copy()->subMonths(3);
                break;
            case 'semiannually':
                $startDate = $endDate->copy()->subMonths(6);
                break;
            default:
                // Default to quarterly if no period is provided
                $startDate = $endDate->copy()->subMonths(3);
        }

        $financialReports = FinancialReport::whereBetween('created_at', [$startDate, $endDate])->get();
        $totalOfferings = $financialReports->sum('total_offerings');
        $totalTithes = $financialReports->sum('total_tithes');
        $totalIncome = $financialReports->sum('total_income');


        return view('financialreport.index', compact('financialReports', 'totalOfferings', 'totalTithes'));
    }
}
