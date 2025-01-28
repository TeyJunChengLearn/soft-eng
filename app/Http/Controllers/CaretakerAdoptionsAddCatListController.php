<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Adoption;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaretakerAdoptionsAddCatListController extends Controller
{
    public function index(Request $request,$sanctuaryID){
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
            $query->doesntHave('adoption');

            $cats = $query->with('adoption')->paginate(20);
            return view('CaretakerAdoptionsCatListAdd',compact('cats','page','sanctuaryID'));
        }else{
            return redirect()->route('caretaker.adoptions.sanctuaryList');
        }
    }

    public function add(Request $request,$sanctuaryID,$catID){
        // dd($request->all(),$sanctuaryID,$catID);
        $user = Auth::user();
        Adoption::create([
            "datetime"=>date("Y-m-d H:i:s"),
            "cat_id"=>$catID,
            "caretaker_id"=>$user->caretaker->id,
        ]);
        return redirect()->route('caretaker.adoptions.catList', ['sanctuaryID' => $sanctuaryID]);
    }
}
