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
/*************  ✨ Windsurf Command ⭐  *************/
    public function showSignupForm()
    {
        return view('user.signup');
    } // Missing closing bracket added here

    /*******  69fc2e30-4dc9-4d52-a3af-446354612b23  *******/
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16|confirmed',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profileFile = $request->file('profile');
        $profileName = time() . '_' . $profileFile->getClientOriginalName();
        $profileFile->move(public_path('images/profiles'), $profileName);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'profile' => 'images/profiles/' . $profileName,
        ];

        User::insert($data);

        return redirect()->route('login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:16'
        ]);
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'User does not exist.'])->withInput();
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Password does not match.'])->withInput();
        }

        Auth::login($user);
        switch ($user->role ?? null) {
            case 'admin':
                return redirect()->intended(route('dashboard'));
            default:
                return redirect()->intended(route('index'));
        }
    }
    public function logout()
    {
        Auth::logout();
        // Auth::flush(); // flush method does not exist on SessionGuard, so commenting out
        return redirect()->route('login')->with('message', 'You have been logged out successfully.');
    }
}
