<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use App\Models\CatActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCatActivitySummaryListController extends Controller
{
    public function index(request $request,$catID){
        $user= Auth::user();
        $page= "catActivity";
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->manager->id)->pluck('id');
        $catIDs = Cat::whereIn('sanctuary_id',$sanctuaryIDs)->pluck('id');
        if(in_array($catID,$catIDs->toArray())){
            $query = CatActivity::where('cat_id','=',$catID)->orderBy('created_at', 'desc');
            if($request->has('search')){
                $searchTerm = $request->input('search');
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('summary', 'like', '%' . $searchTerm . '%');
                })->orderBy('created_at', 'desc');
            }
            $catActivities = $query->paginate( 5);
            return view('ManagerCatsActivitySummaryList',compact('catActivities','page','catID'));
        }else{
            return redirect()->route('manager.catActivity.sanctuaryList');
        }
    }
}
