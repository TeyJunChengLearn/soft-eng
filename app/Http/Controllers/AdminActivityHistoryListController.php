<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminActivityHistory;

class AdminActivityHistoryListController extends Controller
{
    public function index(Request $request){
        $adminActivityHistories = AdminActivityHistory::orderBy("created_at","desc")->paginate(5);
        $page = "adminActivityHistory";
        return view("AdminActivityHistoryList",compact("adminActivityHistories",'page'));
    }
}
