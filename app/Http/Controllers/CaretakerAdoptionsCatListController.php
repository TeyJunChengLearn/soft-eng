<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaretakerAdoptionsCatListController extends Controller
{
    public function index(request $request,$sanctuaryID){
        $user= Auth::user();
        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->caretaker->manager_id)->pluck('id');
        // dd($sanctuaryIDs->toArray(),$sanctuaryID);
        $page="adoptions";
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            $query = Cat::where('sanctuary_id','=',$sanctuaryID);
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', "%{$search}%")
                             ->orWhere('breed', 'like', "%{$search}%");
                });
            }
            $query->has('adoption');

            $cats = $query->with('adoption')->paginate(20);
            return view('CaretakerAdoptionsCatList',compact('cats','page','sanctuaryID'));
        }else{
            return redirect()->route('caretaker.adoptions.sanctuaryList');
        }
    }
}
