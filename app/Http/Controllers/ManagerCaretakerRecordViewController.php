<?php

namespace App\Http\Controllers;

use App\Models\Caretaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCaretakerRecordViewController extends Controller
{
    public function index(Request $request,$caretakerID){
        $user = Auth::user();
        $page="caretakerRecords";
        $caretakerIDs = Caretaker::where("manager_id", '=',$user->manager->id)->pluck('id');
        if(in_array($caretakerID,$caretakerIDs->toArray())){
            $caretaker = Caretaker::find($caretakerID);
            return view('ManagerCaretakerRecordViewRecord',compact('caretaker','page'));
        }
        return redirect()->route('manager.caretaker.list');
    }
}
