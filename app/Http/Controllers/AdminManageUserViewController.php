<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminManageUserViewController extends Controller
{
    public function index(request $request,$userID){
        $user = User::find($userID);
        $page = "manageUsers";
        return view("AdminViewUser",compact("user","page"));
    }
}
