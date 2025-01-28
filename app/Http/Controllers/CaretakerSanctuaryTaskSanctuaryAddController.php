<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\SanctuaryTask;
use Illuminate\Support\Facades\Auth;

class CaretakerSanctuaryTaskSanctuaryAddController extends Controller
{
    public function index(request $request,$sanctuaryID){
        $user= Auth::user();
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->caretaker->manager_id)->pluck('id');
        // dd($sanctuaryIDs->toArray(),$sanctuaryID);
        $page="sanctuaryTask";
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            return view('CaretakerSanctuaryTaskAdd',compact('sanctuaryID','page'));
        }else{
            return redirect()->route('caretaker.sanctuaryTask.sanctuaryList');
        }
    }

    public function add(request $request,$sanctuaryID){
        $user= Auth::user();
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->caretaker->manager_id)->pluck('id');
        // dd($sanctuaryIDs->toArray(),$sanctuaryID);
        $page="sanctuaryTask";
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            SanctuaryTask::create([
                'summary'=>$request->summary,
                'datetime'=>date('Y-m-d H:i:s'),
               'sanctuary_id'=>$sanctuaryID,
               'caretaker_id'=>$user->caretaker->id,
            ]);
            return redirect()->route('caretaker.sanctuaryTask.list',['sanctuaryID'=>$sanctuaryID]);
        }else{
            return redirect()->route('caretaker.sanctuaryTask.sanctuaryList');
        }
    }
}
