<?php

namespace App\Http\Controllers;

use App\Models\MedicalStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalStaffSaveIDController extends Controller
{
    public function index(request $request){
        return view('BasicEnterVetID');
    }

    public function saveID(request $request){
        dd($request->all());
        $medicalStaff=MedicalStaff::where('user_id',Auth::id())->first();
        $medicalStaff->update([
            'vet_id'=>$request->vet_id,
        ]);
    }
}
