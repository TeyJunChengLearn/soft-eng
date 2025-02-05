<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use App\Models\CatActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaretakerCatActivityViewController extends Controller
{
    public function index(request $request,$catID,$catActivityID){
        $user= Auth::user();
        $page= "catActivity";
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->caretaker->manager_id)->pluck('id');
        $catIDs = Cat::whereIn('sanctuary_id',$sanctuaryIDs)->pluck('id');
        if(in_array($catID,$catIDs->toArray())){
            $catActivity= CatActivity::find($catActivityID);
            return view('CaretakerCatsActivityView',compact('catActivity','page','catID'));
        }else{
            return redirect()->route('caretaker.catActivity.sanctuaryList');
        }
    }
}
