<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\CatTreatmentRecord;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\CatHealthRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffTreatmentViewController extends Controller
{
    public function index(request $request,$healthRecordID,$treatmentID){
        $user =Auth::user();
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', $user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $visitableSanctuary = Sanctuary::whereIn("manager_id",$verifiedManagers)
        ->pluck('id');
        $catIDs= Cat::whereIn("sanctuary_id",$visitableSanctuary)->pluck("id");
        $catHealthRecordIDs= CatHealthRecord::whereIn("cat_id",$catIDs)->pluck("id");
        $catTreatmentRecordIDs=CatTreatmentRecord::whereIn('cat_health_record_id',$catHealthRecordIDs)->pluck("id");
        $page="catTreatment";
        if(in_array($treatmentID,$catTreatmentRecordIDs->toArray())){
            $catTreatmentRecord=CatTreatmentRecord::find($treatmentID);
            return view('MedicalStaffTreatmentView',compact('catTreatmentRecord','page','healthRecordID'));
        }else{
            return redirect()->route('medicalStaff.treatment.sanctuaryList');
        }
    }
}
