<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCatRecordViewController extends Controller
{
    public function index(request $request,$catID,$sanctuaryID){
        $user = Auth::user();
        $page= "catRecords";
        $sanctuaryIDs = Sanctuary::where('manager_id',$user->manager->id)->pluck('id');
        $catIDs= Cat::whereIn('sanctuary_id',$sanctuaryIDs)->pluck('id');
        if(in_array($catID,$catIDs->toArray())){
            $cat= Cat::find($catID);
            return view('ManagerCatRecordViewRecord',compact('cat','catID',"sanctuaryID","page"));
        }
        return redirect()->route('manager.catRecord.sanctuaryList');
    }
}
