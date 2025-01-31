<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminActivityHistory;

class AdminActivityHistoryViewController extends Controller
{
    public function index(request $request,$adminActivityHistoryID){
        $adminActivityHistory= AdminActivityHistory::find($adminActivityHistoryID);
        $page = "adminActivityHistory";
        return view('AdminActivityHistoryView',compact('adminActivityHistory','page'));
    }
}
