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
        $user->admin->update([
            "status"=>false,
        ]);
        $user->manager->update([
            "status"=>true,
        ]);
        $user->medicalStaff->update([
            "status"=>false,
        ]);
        $user->caretaker->update([
            "status"=>false,
        ]);
        return redirect()->route("manager.catRecord.sanctuaryList");
    }

    public function medicalStaff(Request $request){
        $user=Auth::user();
        $user->admin->update([
            "status"=>false,
        ]);
        $user->manager->update([
            "status"=>false,
        ]);
        $user->medicalStaff->update([
            "status"=>true,
        ]);
        $user->caretaker->update([
            "status"=>false,
        ]);
        return redirect()->route("medicalStaff.saveID.index");
    }

    public function caretaker(Request $request){
        $user=Auth::user();
        $user->admin->update([
            "status"=>false,
        ]);
        $user->manager->update([
            "status"=>false,
        ]);
        $user->medicalStaff->update([
            "status"=>false,
        ]);
        $user->caretaker->update([
            "status"=>true,
        ]);
        if($user->caretaker->manager_id==null){
            return redirect()->route('caretaker.joinManager.index');
        }else{
            return redirect()->route('caretaker.adoptions.sanctuaryList');
        }
    }
}
