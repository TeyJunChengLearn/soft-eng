<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalStaffAppointmentListController extends Controller
{
    public function index(request $request){
        $user=Auth::user();
        $page= "appointment";
        $appointments=Appointment::where("medical_staff_id",$user->medicalStaff->id)->orderBy('created_at',
        "desc")->paginate(20);

        return view("MedicalStaffAppointmentList",compact('appointments','page'));
    }
}
