<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5); // Adjust the pagination as needed;
        return view('backend.layoutes.userManagement', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.layoutes.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:admin,user',
        ]);

        $profileFile = $request->file('profile');
        $profileName = time() . '_' . $profileFile->getClientOriginalName();
        $profileFile->move(public_path('images/profiles'), $profileName);

        $user = new \App\Models\User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->profile = 'images/profiles/' . $profileName;
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('user-management.index')->with('success', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user_management
     * @return \Illuminate\Http\Response
     */
    public function edit($user_management)
    {
        $user = User::findOrFail($user_management);
        return view('backend.layoutes.editUser', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_management)
    {
        $user = User::findOrFail($user_management);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:admin,user',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        if ($request->hasFile('profile')) {
            $profileFile = $request->file('profile');
            $profileName = time() . '_' . $profileFile->getClientOriginalName();
            $profileFile->move(public_path('images/profiles'), $profileName);
            $user->profile = 'images/profiles/' . $profileName;
        }

        $user->save();

        return redirect()->route('user-management.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user_management
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_management)
    {
        $user = User::findOrFail($user_management);
        $user->delete();

        return redirect()->route('user-management.index')->with('success', 'User deleted successfully.');
    }
}
