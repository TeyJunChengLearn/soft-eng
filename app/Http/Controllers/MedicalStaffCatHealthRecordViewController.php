<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\CatHealthRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffCatHealthRecordViewController extends Controller
{
    public function index(request $request, $catID,$summaryID){
        $user =Auth::user();
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', $user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $visitableSanctuary = Sanctuary::whereIn("manager_id",$verifiedManagers)
        ->pluck('id');
        $catIDs= Cat::whereIn("sanctuary_id",$visitableSanctuary)->pluck("id");
        $catHealthRecordIDs= CatHealthRecord::whereIn("cat_id",$catIDs)->pluck("id");
        $page="catHealthRecord";
        if(in_array($summaryID,$catHealthRecordIDs->toArray())){
            $catHealthRecord=CatHealthRecord::find($summaryID);
            return view('MedicalStaffCatHealthRecordView',compact('catHealthRecord','page','catID'));
        }else{
            return redirect()->route('medicalStaff.healthRecord.sanctuaryList');
        }
    }
}
