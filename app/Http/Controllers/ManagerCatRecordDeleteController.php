<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCatRecordDeleteController extends Controller
{
    public function delete(Request $request,$catID){
        $user=Auth::user();
        $sanctuaryIDs = Sanctuary::where("manager_id",$user->manager->id)->pluck("id");
        $catIDs= Cat::whereIn('sanctuary_id',$sanctuaryIDs)->pluck('id');
        if(in_array($catID,$catIDs->toArray())){
            Cat::find($catID)->delete();
        }
        return redirect()->route('manager.catRecord.sanctuaryList');
    }
}
