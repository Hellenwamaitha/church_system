<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MemberRequest;
// use Illuminate\Support\Facades\Log;



class MemberController extends Controller
{
    // Method to display a listing of the members
    public function index()
{
    // Retrieve all members from the database
    $members = Member::all();

    // Pass the members data to the view for display
    return view('members.index', ['members' => $members]);
}

    // Method to show the form for creating a new member
    public function create()
    {
        return view('members.create');
    }

    // Method to store a newly created member in the database

    public function store(MemberRequest $request)
    {
        try {
            $validatedData = $request->validated();
    
            // Create the new member
            Member::create($validatedData);
    
            // Redirect to the page listing all members with a success message
            return redirect()->route('members.index')->with('success', 'Member created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating member: ' . $e->getMessage());
            // Handle the error or display an error message
            return back()->withError('Error creating member. Please try again.');
        }
    }
    


    // Method to display the specified member
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    // Method to show the form for editing the specified member
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }




    public function update(Request $request, Member $member)
{
    try {

        Log::info('Testing logging functionality.');


        // Validate the incoming request if needed
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'membership' => 'required|string|max:255',
           
        ]);

        // Log the validated data for debugging purposes
        Log::info('Validated data:', $validatedData);

        // Update the member with the validated data
        $member->update($validatedData);

        // Log the updated member data for debugging purposes
        Log::info('Member updated:', $member->toArray());

        // Redirect to the appropriate page with a success message
        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    } catch (\Exception $e) {
        // Log any errors that occur during the update operation
        Log::error('Error updating member:', ['exception' => $e->getMessage()]);

        // Redirect back to the edit page with an error message
        return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while updating the member. Please try again.']);
    }
}

    // Method to remove the specified member from the database
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Validate the search input
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        // Query the database for members matching the search term in first_name or last_name
        $members = Member::where('first_name', 'LIKE', '%' . $query . '%')
                          ->orWhere('last_name', 'LIKE', '%' . $query . '%')
                          ->get();

        // Return the view with the search results
        return view('members.index', compact('members'));
    }

}
