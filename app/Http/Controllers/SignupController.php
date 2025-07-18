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

    public function signup(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile' => $request->file('profile')->store('public/images/profiles', 'public'),
        ];

        User::insert($data);

        return redirect()->route('login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:16'
        ]);
        $user=User::where('email',$request->email)->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                Auth::login($user);

     
     
                switch ($user->role) {
                    case 'admin':
                        return redirect()->intended(route('dashboard'));
                        break;
                        
                    default:
                        return redirect()->intended(route('index'));

                }
                // return redirect()->route('home');
            }
        }
         return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        // Auth::flush(); // flush method does not exist on SessionGuard, so commenting out
        return redirect()->route('login')->with('message', 'You have been logged out successfully.');
    }
}
