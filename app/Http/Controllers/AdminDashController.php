<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data from database for doughnut chart (membership status counts - active and inactive)
        $statusData = Member::select('membership_status', DB::raw('COUNT(*) as count'))
                            ->groupBy('membership_status')
                            ->get();

        return view('admin.dashboard', ['statusData' => $statusData]); // Passing $statusData to the view
    }
}