<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterfaceUseController extends Controller
{
    public function index(Request $request){
        $page="";
        return view("UserFeedback",compact("page"));
    }
}
