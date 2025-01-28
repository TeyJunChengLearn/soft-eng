<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\SanctuaryTask;
use Illuminate\Support\Facades\Auth;

class CaretakerSanctuaryTaskViewController extends Controller
{
    public function index(request $request,$sanctuaryID,$sanctuaryTaskID){
        $user= Auth::user();
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->caretaker->manager_id)->pluck('id');
        // dd($sanctuaryIDs->toArray(),$sanctuaryID);
        $page="sanctuaryTask";
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            $sanctuaryTask = SanctuaryTask::find($sanctuaryTaskID);
            if($sanctuaryTask->caretaker_id == $user->caretaker->id){
                return view('CaretakerSanctuaryTaskView',compact('sanctuaryTask','page','sanctuaryID'));
            }
        }
            return redirect()->route('caretaker.sanctuaryTask.sanctuaryList');

    }
}
