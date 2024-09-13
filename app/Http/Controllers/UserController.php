<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use App\Models\Church;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Requests;
use Illuminate\support\Facades\Hash;

class UserController extends Controller
{
    //Display list of users
    public function index()
    {
        $users = User::with('church','branch')->get();
        return view('users.index', compact('users'));
    }

    // Create form for new user
    public function create()
    {
        $churches = Church::all();
        $branches = Branch::all();
        return view('users.index', compact('churches', 'branches'));
    }

    //Store newly created user
    // public function store(UserRequest $requests)
    // {
    //  $validateDate = $requests->validate();
    //  $validateDate['password'] = Hash::make($requests->password);

    //  user::create($validateData);

    //  return redirect()->route('users.index')
    //                  ->with('success', 'User created successfuly.');
    // }

    //Display specified user
    public function show($id)
    {
      $user = User::findorfail($id);
      $churches = Church::all();
      $branches = Branch::all();
      
      return view('users.index', compact('user','churches','branches'));
    }

     // Update a specified User in the Database
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validated();

        // Only hash the password if it's been changed
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    //Remove the specified user from the database
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->route('users.index')->with('succes', 'User deleted successfuly');
    }
}
