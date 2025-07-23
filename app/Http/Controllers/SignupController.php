<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function showSignupForm()
    {
        return view('user.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profileFile = $request->file('profile');
        $profileName = time() . '_' . $profileFile->getClientOriginalName();
        $profileFile->move(public_path('images/profiles'), $profileName);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'profile_picture' => 'images/profiles/' . $profileName,
        ];

        User::insert($data);

        return redirect()->route('login')->with('message', 'Signup successful! Please login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:16',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);

            switch ($user->role ?? null) {
                case 'admin':
                    return redirect()->intended(route('dashboard'))->with('message', 'Welcome Admin!');
                default:
                    return redirect()->intended(route('index'))->with('message', 'Welcome User!');
            }
        }

        return redirect()->back()->with('message', 'Invalid email or password.');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush(); // Optional: clears all session data
        return redirect()->route('login')->with('message', 'You have been logged out successfully.');
    }
}
