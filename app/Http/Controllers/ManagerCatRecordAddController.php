<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCatRecordAddController extends Controller
{
    public function index(request $request,$sanctuaryID){
        $page="catRecords";
        $user = Auth::user();
        $sanctuaryIDs= Sanctuary::where('manager_id','=',$user->manager->id)->pluck('id');
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){

            return view('ManagerCatRecordAdd',compact('sanctuaryID','page'));
        }
        return redirect()->route('manager.catRecord.sanctuaryList');
    }

    public function add(request $request,$sanctuaryID){
        $user = Auth::user();
        $sanctuaryIDs= Sanctuary::where('manager_id','=',$user->manager->id)->pluck('id');
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            Cat::create([
                'name'=>$request->name,
                "gender"=>filter_var($request->gender, FILTER_VALIDATE_BOOLEAN),
                "breed"=>$request->breed,
                "birthdate"=>$request->birthdate,
                "general_story"=>$request->general_story,
                "sanctuary_id"=>$sanctuaryID,
            ]);
            return redirect()->route('manager.catRecord.sanctuaryList');
        }
        return redirect()->route('manager.catRecord.sanctuaryList');
    }
}
