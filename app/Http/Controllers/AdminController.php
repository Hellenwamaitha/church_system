<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    // Member List
    public function memberList()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    // Add Member
    public function createMember()
    {
        return view('members.create');
    }

    public function storeMember(Request $request)
    {
        // Validate and store the new member details
    }

    // Edit Member
    public function editMember(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function updateMember(Request $request, Member $member)
    {
        // Validate and update the member details
    }

    // Delete Member
    public function deleteMember(Member $member)
    {
        // Delete the member
    }
}
