<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function forgotPasswordIndex(request $request){
        return view("BasicForgotPassword");
    }

    public function sendResetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email|exists:users,email']);

    $token = Str::random(64); // Generate a random token

    // Delete existing token for this email
    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    // Insert the new token
    DB::table('password_reset_tokens')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => now(),
    ]);

    $link = url('/password/reset/' . $token);

    Mail::send('auth.emails.reset', ['link' => $link], function ($message) use ($request) {
        $message->to($request->email)
            ->subject('Reset Your Password');
    });

    return redirect()->route('landing.index');
}


    public function resetPasswordIndex($token){
        return view('BasicResetPassword', ['tokenID' => $token]);
    }

    public function resetPassword(Request $request)
{
    // dd($request->all());
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|confirmed|min:8',
        'token' => 'required'
    ]);

    // Fetch the reset token record
    $record = DB::table('password_reset_tokens')
        ->where('token', $request->token)
        ->where('email', $request->email)
        ->first();

    if (!$record) {
        return back()->withErrors(['email' => 'Invalid token or email.']);
    }

    // Check if the token is expired
    $tokenExpiration = Carbon::parse($record->created_at)->addMinutes(10);
    if (Carbon::now()->greaterThan($tokenExpiration)) {
        return back()->withErrors(['token' => 'This password reset token has expired.']);
    }

    // Update the user's password
    User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

    // Delete the token after use
    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    return redirect()->route("landing.index");
}
}
