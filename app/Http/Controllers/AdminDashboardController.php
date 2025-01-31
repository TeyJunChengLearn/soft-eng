<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\AdminActivityHistory;

class AdminDashboardController extends Controller
{
    public function index(){
        $adminActivityHistory=AdminActivityHistory::orderBy("created_at","desc")->first();
        $feedback=Feedback::orderBy("created_at","desc")->first();
        $page = "dashboard";
        return view('AdminDashboard',compact('adminActivityHistory','feedback','page'));
    }
}
