<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffMedicalCareCatListController extends Controller
{
    public function index(request $request,$sanctuaryID){
        $user = Auth::user();
        // $medicalStaffVerification=MedicalStaffVerification::where('medical_staff_id','=',$user->medicalStaff->id);
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', $user->medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $visitableSanctuary = Sanctuary::whereIn("manager_id",$verifiedManagers)
        ->pluck('id');
        $page="catMedicalCare";
        if(in_array($sanctuaryID,$visitableSanctuary->toArray())){
            $query = Cat::where('sanctuary_id',"=",$sanctuaryID);

            if($request->has('search')){
                $searchTerm = $request->input('search');
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%')->orWhere('breed','like','%' . $searchTerm . '%');
                });
            }
            $cats = $query->paginate(20);
            return view('MedicalStaffMedicalCareCatList',compact('cats','page'));
        }else{
            return redirect()->route('medicalStaff.medicalCare.sanctuaryList');
        }
    }
}
