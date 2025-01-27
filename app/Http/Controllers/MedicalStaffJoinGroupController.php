<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffJoinGroupController extends Controller
{
    public function index(request $request){
        $page= 'joinGroup';
        return view('MedicalStaffRequestJoinGroup',compact('page'));
    }

    public function add(request $request){
        $user = Auth::user();
        MedicalStaffVerification::create([
            "approval"=>false,
            "medical_staff_id"=>$user->medicalStaff->id,
            "manager_id"=>$request->manager_id,
        ]);
        return redirect()->back()->with("success","Success");
    }
}
