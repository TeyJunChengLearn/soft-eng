<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffAppointmentAddController extends Controller
{
    public function index(request $request,$catID){
        $user = Auth::user();
        $managerIDs =  MedicalStaffVerification::where('medical_staff_id',$user->medicalStaff->id)
                        ->where('approval','=',true)
                        ->pluck('manager_id');
        $sanctuaryIDs = Sanctuary::whereIn('manager_id',$managerIDs)
                        ->pluck('id');
        $catIDs = Cat::whereIn('sanctuary_id',$sanctuaryIDs)->pluck('id');
        $page="appointment";
        if(in_array($catID,$catIDs->toArray())){
            $cat= Cat::find($catID);
            return view('MedicalStaffAppointmentAddRecord',compact('cat','page'));
        }else{
            return redirect()->route('medicalStaff.appointment.list');
        }
    }

    public function add(request $request,$catID){
        $user = Auth::user();
        $managerIDs =  MedicalStaffVerification::where('medical_staff_id',$user->medicalStaff->id)
                        ->where('approval','=',true)
                        ->pluck('manager_id');
        $sanctuaryIDs = Sanctuary::whereIn('manager_id',$managerIDs)
                        ->pluck('id');
        $catIDs = Cat::whereIn('sanctuary_id',$sanctuaryIDs)->pluck('id');
        $page="appointment";
        if(in_array($catID,$catIDs->toArray())){
            Appointment::create([
                "datetime"=>$request->datetime,
                "cat_id"=>$catID,
                "medical_staff_id"=>$user->medicalStaff->id,
            ]);
            return redirect()->route('medicalStaff.appointment.list');
        }else{
            return redirect()->route('medicalStaff.appointment.list');
        }
    }
}
