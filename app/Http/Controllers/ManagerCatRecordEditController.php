<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCatRecordEditController extends Controller
{
    public function index(Request $request,$catID,$sanctuaryID){
        $user= Auth::user();
        $page="catRecords";
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->manager->id)->pluck('id');
        $catIDs=Cat::whereIn("sanctuary_id",$sanctuaryIDs)->pluck('id');
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            if(in_array($catID,$catIDs->toArray())){
                $cat = Cat::find($catID);
                return view('ManagerCatRecordEdit',compact('cat','catID','sanctuaryID',"page"));
            }
        }
        return redirect()->route('manager.catRecord.sanctuaryList');
    }

    public function edit(Request $request,$catID,$sanctuaryID){
        $user= Auth::user();
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->manager->id)->pluck('id');
        $catIDs=Cat::whereIn("sanctuary_id",$sanctuaryIDs)->pluck('id');
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            if(in_array($catID,$catIDs->toArray())){
                Cat::where('id','=',$catID)->update([
                    'name'=>$request->name,
                    "gender"=>filter_var($request->gender, FILTER_VALIDATE_BOOLEAN),
                    "breed"=>$request->breed,
                    "birthdate"=>$request->birthdate,
                    "general_story"=>$request->general_story,
                    "sanctuary_id"=>$sanctuaryID,
                ]);
                return redirect()->route('manager.catRecord.List',['sanctuaryID'=>$sanctuaryID]);
            }
        }
        return redirect()->route('manager.catRecord.sanctuaryList');
    }
}
