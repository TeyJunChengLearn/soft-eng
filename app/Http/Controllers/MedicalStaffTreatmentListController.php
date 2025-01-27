<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\CatHealthRecord;
use App\Models\CatTreatmentRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffTreatmentListController extends Controller
{
    public function index(request $request,$healthRecordID){
        $user = Auth::user();
        $page="catTreatment";
        // $medicalStaffVerification=MedicalStaffVerification::where('medical_staff_id','=',$user->medicalStaff->id);
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', $user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $visitableSanctuary = Sanctuary::whereIn("manager_id",$verifiedManagers)
        ->pluck('id');
        $visitableCat = Cat::whereIn('sanctuary_id',$visitableSanctuary)->pluck('id');
        $allHealthRecordIDs = CatHealthRecord::whereIn('cat_id',$visitableCat)->pluck('id');
        // $allCatTreatmentIDs = CatTreatmentRecord::whereIn('cat_health_record_id',$allHealthRecordIDs)->pluck('id');
        if(in_array($healthRecordID,$allHealthRecordIDs->toArray())){
            $query=CatTreatmentRecord::where('cat_health_record_id','=',$healthRecordID)->orderBy('created_at', 'desc');
            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('summary', 'like', '%' . $searchTerm . '%');
                })->orderBy('created_at', 'desc');
            }
            $treatmentRecords = $query->paginate(5);
            return view('MedicalStaffTreatmentList',compact('treatmentRecords','page','healthRecordID'));
        }else{
            return redirect()->route('medicalStaff.treatment.sanctuaryList');
        }
    }
}
