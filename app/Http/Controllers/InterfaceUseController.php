<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterfaceUseController extends Controller
{
    public function index(Request $request){
        return view("CaretakerRequestSuppliesAdd");
    }
}
