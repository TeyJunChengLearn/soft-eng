<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view("BasicLogin");
    }

    public function login(Request $request){
        $request->validate([
            'email'=>"required|email",
            'password'=>"required|string",
        ]);

        $user = User::where("email", $request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            Auth::login($user);

            if($user->manager->status==false && $user->medicalStaff->status==false && $user->admin->status==false&&$user->caretaker->status==false){
                return redirect()->route("selectRole.index");
            }
        }

        return back()->withErrors(["invalid credentials"]);
    }
}
