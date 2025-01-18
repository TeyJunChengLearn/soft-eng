<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectRoleController extends Controller
{
    public function index(Request $request){
        return view("BasicSelectRole");
    }

    public function manager(Request $request){
        $user=Auth::user();
        $user->manager->update([
            "status"=>true,
        ]);
    }

    public function medicalStaff(Request $request){
        $user=Auth::user();
        $user->medicalStaff->update([
            "status"=>true,
        ]);
    }

    public function caretaker(Request $request){
        $user=Auth::user();
        $user->caretaker->update([
            "status"=>true,
        ]);
    }
}
