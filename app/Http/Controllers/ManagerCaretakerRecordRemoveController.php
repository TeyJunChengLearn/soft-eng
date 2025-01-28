<?php

namespace App\Http\Controllers;

use App\Models\Caretaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCaretakerRecordRemoveController extends Controller
{
    public function remove(request $request,$caretakerID){
        // dd($caretakerID);
        $user = Auth::user();
        $page="caretakerRecords";
        $caretakerIDs = Caretaker::where("manager_id", '=',$user->manager->id)->pluck('id');
        if(in_array($caretakerID,$caretakerIDs->toArray())){
            Caretaker::find($caretakerID)->update([
                'manager_id'=>null,
            ]);
        }
        return redirect()->route('manager.caretaker.list');
    }
}
