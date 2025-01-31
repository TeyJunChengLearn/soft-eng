<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function medicalStaffIndex(){
        $page= "feedback";
        return view("MedicalStaffFeedback",compact("page"));
    }

    public function caretakerIndex(){
        $page= "feedback";
        return view("CaretakerFeedback",compact("page"));
    }

    public function managerIndex(){
        $page= "feedback";
        return view("ManagerFeedback",compact("page"));
    }

    public function adminIndex(){
        $page= "feedback";
        return view("AdminFeedback",compact("page"));
    }

    public function add(request $request){
        $user=Auth::user();
        Feedback::create([
            "details"=>$request->details,
            "datetime"=>date("Y-m-d H:i:s"),
            "user_id"=>$user->id,
        ]);

        return redirect()->back();
    }
}
