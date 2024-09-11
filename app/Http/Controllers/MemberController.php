<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Branch;
use App\Http\Requests\MemberRequest;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    // Display a list of members.
   public function index() 
   {
    //Eager load branch reletionship
    $members = Member::with('branch')->get();
    return view('members.index', compact('members'));
   }

   // Show form for creating a new member.
   public function create()
   {
    // Fetch all branches for dropdown
    $branches = Branch::all();
    return view('members.create', compact('branches'));
   }

   //Store newly created member in the database.
   public function store(MemberRequest $request)
   {
    Member::create($request->validate());
    return redirect()->route('members.index')
                     ->with('success', 'Memeber created successfuly.');
   }

   //Show specified member
   public function show($id)
   {
    $member = Member::with('branch')->findorfail($id);
    return view('members.show', compact('memeber'));
   }

   //  Show form for editing the specified member
   public function edit($id)
    {
        $member = Member::findorfail($id);
        $branches = Branch::all(); // fetch all branches for dropdown
        return view('members.edit', compact('member', 'branches'));
    }

  // Update specified member in the database
    public function update(MemberRequest $request,$id)
    {
    $member= Member::findorfail($id);
    $member->update($request->validated());

    return redirect()->route('members.index')
                        ->with('sucess', 'member updated successfully');
    }

    // remove specified member.
    public function destroy($id)
    {

    $member = Member::findorfail($id);
    $member->delete();
    return redirect()->route('members.index')
                    ->with('success', 'Member deleted sucessfully');
    }  

    // Handle the bulk upload of members via a CSV file
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


