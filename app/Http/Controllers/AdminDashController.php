<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class AdminDashController extends Controller
{

    /**
     * Display the main dashboard view.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        return view('admin.dashboard');
    }

    public function getCountData()
    {
        //fetch total members using the count method
      $totalMembers = Member::count();

      // fetch active members using Where method
      $activeMembers = Member::Where('membership_status', 'active')->count();

      // fetch inactive members using Where method
      $inactiveMember = Member::Where('membership_status','inactive')->count();

      //Return the data as JSON
      return response()->json([
        'totalMembers' =>$totalMembers,
        'activeMembers' =>$activeMembers,
        'inactiveMembers' =>$inactiveMembers,
      ]);
    }
        

} 