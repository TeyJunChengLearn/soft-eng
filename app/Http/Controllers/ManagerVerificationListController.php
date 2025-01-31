<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class ManagerVerificationListController extends Controller
{
    public function index(request $request){
        $user = Auth::user();
        $verifications=MedicalStaffVerification::where("manager_id","=", $user->manager->id)
                        ->where('approval','=',false)->paginate(5);
        $page= "verification";
        return view('ManagerVerificationMedicalStaff',compact('verifications','page','user'));

    }
}
