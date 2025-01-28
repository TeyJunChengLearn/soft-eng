<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCatRecordListController extends Controller
{
    public function index(request $request,$sanctuaryID){
        $page="catRecords";
        $user = Auth::user();
        $sanctuaryIDs= Sanctuary::where('manager_id','=',$user->manager->id)->pluck('id');
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            $query=Cat::where("sanctuary_id",'=',$sanctuaryID);
            if($request->has('search')){
                $searchTerm = $request->input('search');
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%')->orWhere('breed','like','%' . $searchTerm . '%');
                });
            }
            $cats=$query->paginate(20);
            return view('ManagerCatRecordList',compact('cats','page','sanctuaryID'));
        }
        return redirect()->route('manager.catRecord.sanctuaryList');
    }
}
