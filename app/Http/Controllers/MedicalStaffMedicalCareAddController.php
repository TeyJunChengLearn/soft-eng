<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\CatHealthRecord;
use App\Models\CatMedicalCareRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffMedicalCareAddController extends Controller
{
    public function index(Request $request,$healthRecordID){
        $user = Auth::user();
        $page="catTreatment";
        // $medicalStaffVerification=MedicalStaffVerification::where('medical_staff_id','=',$user->medicalStaff->id);
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', "=",$user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $visitableSanctuary = Sanctuary::whereIn("manager_id",$verifiedManagers)
        ->pluck('id');
        $visitableCat = Cat::whereIn('sanctuary_id',$visitableSanctuary)->pluck('id');
        $allHealthRecordIDs = CatHealthRecord::whereIn('cat_id',$visitableCat)->pluck('id');
        // $allCatTreatmentIDs = CatTreatmentRecord::whereIn('cat_health_record_id',$allHealthRecordIDs)->pluck('id');
        if(in_array($healthRecordID,$allHealthRecordIDs->toArray())){
            $cat=CatHealthRecord::where('id',"=",$healthRecordID)->first();
            $cat=$cat->cat;
            return view('MedicalStaffMedicalCareAdd',compact('page','healthRecordID',"cat"));
        }else{
            return redirect()->route('medicalStaff.medicalCare.sanctuaryList');
        }
    }
    public function add(Request $request,$healthRecordID){
        $user = Auth::user();
        $page="catTreatment";
        // $medicalStaffVerification=MedicalStaffVerification::where('medical_staff_id','=',$user->medicalStaff->id);
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', "=",$user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $visitableSanctuary = Sanctuary::whereIn("manager_id",$verifiedManagers)
        ->pluck('id');
        $visitableCat = Cat::whereIn('sanctuary_id',$visitableSanctuary)->pluck('id');
        $allHealthRecordIDs = CatHealthRecord::whereIn('cat_id',$visitableCat)->pluck('id');
        // $allCatTreatmentIDs = CatTreatmentRecord::whereIn('cat_health_record_id',$allHealthRecordIDs)->pluck('id');
        if(in_array($healthRecordID,$allHealthRecordIDs->toArray())){
            CatMedicalCareRecord::create([
                'medicine_name'=>$request->medicine_name,
                "arrangement"=>$request->arrangement,
                'cat_health_record_id'=>$healthRecordID,

            ]);
            $cat=CatHealthRecord::where('id',"=",$healthRecordID)->first();
            $cat=$cat->cat;
            return redirect()->route('medicalStaff.medicalCare.List',['healthRecordID'=>$healthRecordID]);
        }else{
            return redirect()->route('medicalStaff.medicalCare.sanctuaryList');
        }
    }
}
