<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\CatHealthRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffHealthRecordSummaryListController extends Controller
{
    public function index(Request $request,$catID){
        $page= "catHealthRecord";
        $user= Auth::user();
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', $user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $allSanctuarieID = Sanctuary::whereIn('manager_id', $verifiedManagers)->pluck('id');
        $allCatID = Cat::whereIn("sanctuary_id", $allSanctuarieID)->pluck('id');
        if(in_array($catID,$allCatID->toArray())){
            $query = CatHealthRecord::where('cat_id', $catID)->orderBy('created_at', 'desc');
            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('summary', 'like', '%' . $searchTerm . '%');
                })->orderBy('created_at', 'desc');
            }
            $catHealthRecords = $query->paginate(5);

            return view('MedicalStaffCatHealthRecordSummaryList',compact('catHealthRecords','page',"catID"));
        }else{
            return redirect()->route('medicalStaff.healthRecord.sanctuaryList');
        }
    }
}
