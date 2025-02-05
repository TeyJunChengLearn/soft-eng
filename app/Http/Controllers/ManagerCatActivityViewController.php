<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use App\Models\CatActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCatActivityViewController extends Controller
{
    public function index(request $request,$catID,$catActivityID){
        $user= Auth::user();
        $page= "catActivity";
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->manager->id)->pluck('id');
        $catIDs = Cat::whereIn('sanctuary_id',$sanctuaryIDs)->pluck('id');
        if(in_array($catID,$catIDs->toArray())){
            $catActivity= CatActivity::find($catActivityID);
            return view('ManagerCatsActivityView',compact('catActivity','page','catID'));
        }else{
            return redirect()->route('manager.catActivity.sanctuaryList');
        }
    }
}
