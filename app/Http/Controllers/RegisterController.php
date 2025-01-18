<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Manager;
use App\Models\Caretaker;
use App\Models\MedicalStaff;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(Request $request){
        return view("BasicCreateAccount");
    }

    public function register(Request $request){
        // return $request->all();
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user=User::create([
            "username" => $validatedData["username"],
            "email"=> $validatedData["email"],
            "password"=> bcrypt($validatedData['password']),
        ]);
        Admin::create([
            'user_id' => $user->id,
            'status' => false,
        ]);

        Manager::create([
            'user_id' => $user->id,
            'status' => false,
        ]);

        MedicalStaff::create([
            'user_id' => $user->id,
            'status' => false,
        ]);

        Caretaker::create([
            'user_id' => $user->id,
            'status' => false,
        ]);

        return redirect()->route("landing.index");
    }
}
