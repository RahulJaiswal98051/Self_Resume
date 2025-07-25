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
<<<<<<< HEAD
            'password' => 'required|min:8|max:16|confirmed',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
=======
            'password' => 'required|min:8|max:16',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
>>>>>>> f12d85d5ccc48ca5ef488b74872a0049100d4442
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

<<<<<<< HEAD
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
=======
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
>>>>>>> f12d85d5ccc48ca5ef488b74872a0049100d4442
    }

    public function logout()
    {
        Auth::logout();
        session()->flush(); // Optional: clears all session data
        return redirect()->route('login')->with('message', 'You have been logged out successfully.');
    }
}
