<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\CatHealthRecord;
use App\Models\CatMedicalCareRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffMedicalCareViewController extends Controller
{
    public function index(request $request,$healthRecordID,$medicalCareID){
        $user =Auth::user();
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', $user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $visitableSanctuary = Sanctuary::whereIn("manager_id",$verifiedManagers)
        ->pluck('id');
        $catIDs= Cat::whereIn("sanctuary_id",$visitableSanctuary)->pluck("id");
        $catHealthRecordIDs= CatHealthRecord::whereIn("cat_id",$catIDs)->pluck("id");
        $catMedicalCareRecordIDs=CatMedicalCareRecord::whereIn('cat_health_record_id',$catHealthRecordIDs)->pluck("id");
        $page="catMedicalCare";
        if(in_array($medicalCareID,$catMedicalCareRecordIDs->toArray())){
            $catMedicalCareRecord=CatMedicalCareRecord::find($medicalCareID);
            return view('MedicalStaffMedicalCareView',compact('catMedicalCareRecord','page','healthRecordID'));
        }else{
            return redirect()->route('medicalStaff.treatment.sanctuaryList');
        }
    }
}
