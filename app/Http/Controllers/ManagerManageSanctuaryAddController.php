<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerManageSanctuaryAddController extends Controller
{

    public function index(Request $request){
        $page = "manageSanctuary";
        return view('ManagerSanctuaryAdd',compact('page'));
    }

    public function add(request $request){
        $user= Auth::user();
        Sanctuary::create([
            'name'=> $request->name,
            'address'=> $request->address,
            'manager_id'=> $user->manager->id,
        ]);
        return redirect()->route('manager.manageSanctuary.list');
    }
}
