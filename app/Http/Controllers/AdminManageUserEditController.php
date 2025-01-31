<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Manager;
use App\Models\Caretaker;
use App\Models\MedicalStaff;
use Illuminate\Http\Request;
use App\Models\AdminActivityHistory;
use Illuminate\Support\Facades\Auth;

class AdminManageUserEditController extends Controller
{
    public function index(Request $request,$userID){
        $user = User::find($userID);
        $page = "manageUsers";
        return view("AdminEditUser",compact("user",'page'));
    }

    public function edit(request $request,$userID){
        $user = User::find($userID);
        $details="has edited the user with email ".$user->email;
        // dd($request->all());
        User::find($userID)->update([
            'username'=>$request->username,
            'email'=>$request->email,
        ]);
        if($request->role=='admin'){
            Admin::find($user->admin->id)->update([
                'status'=>true,
            ]);
            Manager::find($user->manager->id)->update([
                'status'=>false,
            ]);
            MedicalStaff::find($user->medicalStaff->id)->update([
                'status'=>false,
            ]);
            Caretaker::find($user->caretaker->id)->update([
                'status'=>false,
            ]);
        }else if($request->role=='manager'){
            Admin::find($user->admin->id)->update([
                'status'=>false,
            ]);
            Manager::find($user->manager->id)->update([
                'status'=>true,
            ]);
            MedicalStaff::find($user->medicalStaff->id)->update([
                'status'=>false,
            ]);
            Caretaker::find($user->caretaker->id)->update([
                'status'=>false,
            ]);
        }else if($request->role=='medicalStaff'){
            Admin::find($user->admin->id)->update([
                'status'=>false,
            ]);
            Manager::find($user->manager->id)->update([
                'status'=>false,
            ]);
            MedicalStaff::find($user->medicalStaff->id)->update([
                'status'=>true,
            ]);
            Caretaker::find($user->caretaker->id)->update([
                'status'=>false,
            ]);
        }else if($request->role=='caretaker'){
            Admin::find($user->admin->id)->update([
                'status'=>false,
            ]);
            Manager::find($user->manager->id)->update([
                'status'=>false,
            ]);
            MedicalStaff::find($user->medicalStaff->id)->update([
                'status'=>false,
            ]);
            Caretaker::find($user->caretaker->id)->update([
                'status'=>true,
            ]);
        }else{
            dd("error");
        }
        $user=Auth::user();

        AdminActivityHistory::create([
            "details"=>$details,
            "datetime"=>date("Y-m-d H:i:s"),
            "admin_id"=>$user->admin->id,
        ]);
        return redirect()->route("admin.manageUser.list");
    }
}
