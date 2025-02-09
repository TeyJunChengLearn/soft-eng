<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\CatHealthRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffHealthRecordAddController extends Controller
{
    public function index(request $request,$catID){
        $page= "catHealthRecord";
        $user= Auth::user();
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', $user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $allSanctuarieID = Sanctuary::whereIn('manager_id', $verifiedManagers)->pluck('id');
        $allCatID = Cat::whereIn("sanctuary_id", $allSanctuarieID)->pluck('id');
        if(in_array($catID,$allCatID->toArray())){
            $cat =Cat::where ('id',$catID)->first();
            return view('MedicalStaffCatHealthRecordAdd',compact('page',"catID",'cat'));
        }else{
            return redirect()->route('medicalStaff.healthRecord.sanctuaryList');
        }
    }

    public function add(Request $request,$catID){
        $page= "catHealthRecords";
        $user= Auth::user();
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', $user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $allSanctuarieID = Sanctuary::whereIn('manager_id', $verifiedManagers)->pluck('id');
        $allCatID = Cat::whereIn("sanctuary_id", $allSanctuarieID)->pluck('id');
        if(in_array($catID,$allCatID->toArray())){
            CatHealthRecord::create([
                'summary'=>$request->summary,
                'datetime'=>date('Y-m-d H:i:s'),
                'medical_staff_id'=>$user->medicalStaff->id,
                'cat_id'=>$catID,
            ]);
            return redirect()->route('medicalStaff.healthRecord.summaryList',['catID'=>$catID]);
        }else{
            return redirect()->route('medicalStaff.healthRecord.sanctuaryList');
        }
    }
}
