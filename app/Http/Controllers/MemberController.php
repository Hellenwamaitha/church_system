<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Http\Requests\MemberRequest;
use Illuminate\Http\Request;


class MemberController extends Controller
{
   public function index() 
   {
    $members = Member::all();
    return view('members.index', compact('members'));
   }

   public function create()
   {
    return view('members.create');
   }

   public function store(MemberRequest $request)
   {
    Member::create($request->validate());
    return redirect()->route('members.index')
                     ->with('success', 'Memeber created successfuly.');
   }

   public function show(Member $member)
   {
      return view('members.show', compact('memeber'));
   }

   public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

  
    public function update(MemberRequest $request,Member $member)
    {
    $member->update($request->validate());

    return redirect()->route('members.index')
                        ->with('sucess', 'member updated successfully');
    }

    public function destroy(Member $member)
    {

    $member->delete();
    return redirect()->route('members.index')
                    ->with('success', 'Member deleted sucessfully');
    }  

public function upload(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:csv,txt|max:2048',
    ]);

    $file = $request->file('file');
    $csvData = array_map('str_getcsv', file($file->getRealPath()));
    
    foreach ($csvData as $row) {
        // Assuming CSV columns match the model attributes
        Member::updateOrCreate([
            'email' => $row[3], // Unique identifier
        ], [
            'branch_id' => $row[0],
            'first_name' => $row[1],
            'last_name' => $row[2],
            'phone_number' => $row[4],
            'address' => $row[5],
            'membership_status' => $row[6],
            'joined_date' => $row[7],
            'category' => $row[8],
        ]);
    }

    return redirect()->route('members.index')
                     ->with('success', 'Members uploaded successfully.');
}


}


