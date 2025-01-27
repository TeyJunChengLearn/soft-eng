<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class MedicalStaffAppointmentRemoveController extends Controller
{
    public function remove(request $request,$appointmentID){
        $appointment = Appointment::find($appointmentID);
        $appointment->delete();
        return redirect()->back();
    }
}
