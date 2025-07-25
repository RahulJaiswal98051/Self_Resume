<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    // Show form to request password reset link
    public function showRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Handle form submission to send reset link
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(60);

        // Delete any existing tokens for this email
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Insert new token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Send email with reset link
        $resetLink = url('/password-reset/' . $token);

        Mail::send('emails.password_reset', ['resetLink' => $resetLink], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Password Reset Request');
        });

        return back()->with('status', 'We have emailed your password reset link!');
    }

    // Show form to reset password
    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    // Handle password reset form submission
    public function reset(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $passwordReset = DB::table('password_resets')->where('token', $token)->first();

        if (!$passwordReset) {
            return redirect()->route('password.request')->withErrors(['token' => 'Invalid or expired token.']);
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return redirect()->route('password.request')->withErrors(['email' => 'No user found for this token.']);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        // Delete the token after successful reset
        DB::table('password_resets')->where('email', $user->email)->delete();

        return redirect()->route('login')->with('status', 'Your password has been reset!');
    }
}
