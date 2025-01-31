<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerManageSanctuaryEditController extends Controller
{
    public function index(request $request,$sanctuaryID){
        $user =Auth::user();
        $page = "manageSanctuary";
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->manager->id)->pluck('id');
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            $sanctuary = Sanctuary::find($sanctuaryID);
            return view('ManagerSanctuaryEdit',compact('sanctuary','page'));
        }
        return redirect()->route('manager.manageSanctuary.list');
    }
    public function edit(request $request,$sanctuaryID){
        $user =Auth::user();
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->manager->id)->pluck('id');
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            Sanctuary::find($sanctuaryID)->update([
                'name'=>$request->name,
                'address'=>$request->address,
            ]);
        }
        return redirect()->route('manager.manageSanctuary.list');
    }
}
