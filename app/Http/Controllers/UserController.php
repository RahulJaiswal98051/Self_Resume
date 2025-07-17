<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index')->with('users', User::all());
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
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
                        redirect()->intended(route('admin.dashboard'));

                        break;
                    default:
                        return redirect()->intended(route('index'));

                }
                // return redirect()->route('home');
            }
        }
         return redirect()->back();
    }
}
