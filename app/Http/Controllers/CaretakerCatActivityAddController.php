<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use App\Models\CatActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaretakerCatActivityAddController extends Controller
{
    public function index(request $request,$catID){
        $user= Auth::user();
        $page= "catActivity";
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->caretaker->manager_id)->pluck('id');
        $catIDs = Cat::whereIn('sanctuary_id',$sanctuaryIDs)->pluck('id');
        if(in_array($catID,$catIDs->toArray())){
            $cat = Cat::find($catID);
            return view('CaretakerCatsActivityAdd',compact('cat','page','catID'));
        }else{
            return redirect()->route('caretaker.catActivity.sanctuaryList');
        }
    }

    public function add(request $request,$catID){
        $user= Auth::user();
        $page= "catActivity";
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->caretaker->manager_id)->pluck('id');
        $catIDs = Cat::whereIn('sanctuary_id',$sanctuaryIDs)->pluck('id');
        if(in_array($catID,$catIDs->toArray())){
            CatActivity::create([
                "datetime"=>date('Y-m-d H:i:s'),
                "summary"=>$request->summary,
                "cat_id"=>$catID,
                "caretaker_id"=>$user->caretaker->id,
            ]);
            return redirect()->route('caretaker.catActivity.summaryList',['catID'=>$catID]);
        }else{
            return redirect()->route('caretaker.catActivity.sanctuaryList');
        }
    }
}
