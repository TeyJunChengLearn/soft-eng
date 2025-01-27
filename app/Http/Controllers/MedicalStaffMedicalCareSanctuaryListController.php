<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use App\Models\MedicalStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalStaffVerification;

class MedicalStaffMedicalCareSanctuaryListController extends Controller
{
    public function index(request $request){
        $user = Auth::user();
        $medicalStaff= MedicalStaff::where("user_id",$user->id)->first();
        $verifiedManagers = MedicalStaffVerification::where('medical_staff_id', $medicalStaff->id)
        ->where('approval', true)
        ->pluck('manager_id');
        $page='catMedicalCare';
        if ($verifiedManagers->isNotEmpty()) {
            $query = Sanctuary::whereIn('manager_id', $verifiedManagers);

            // Check if 'search' exists in the request and apply filters
            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%')
                      ->orWhere('address', 'like', '%' . $searchTerm . '%');
                });
            }

            $sanctuaries = $query->paginate(20);

        // Output or return sanctuaries
        return view('MedicalStaffMedicalCareSanctuaryList', compact('sanctuaries','verifiedManagers','page'));
        } else {
        return view('MedicalStaffMedicalCareSanctuaryList', compact('verifiedManagers','page'));
        }
    }
}
