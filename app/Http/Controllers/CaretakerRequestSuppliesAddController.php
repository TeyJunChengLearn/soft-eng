<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\SupplyRequest;
use Illuminate\Support\Facades\Auth;

class CaretakerRequestSuppliesAddController extends Controller
{
    public function index(request $request,$sanctuaryID){
        $page= "requestSupplies";
        $user = Auth::user();
        $sanctuaryIDs = Sanctuary::where("manager_id",'=',$user->caretaker->manager_id)->pluck('id');
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            return view('CaretakerRequestSuppliesAdd',compact('page','sanctuaryID'));
        }
        return redirect()->route('caretaker.requestSupply.list');
    }

    public function add(Request $request,$sanctuaryID){
        $user = Auth::user();
        $sanctuaryIDs = Sanctuary::where("manager_id",'=',$user->caretaker->manager_id)->pluck('id');
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            SupplyRequest::create([
                "item_name"=>$request->item_name,
                "quantity"=>$request->quantity,
                "datetime"=>date('Y-m-d H:i:s'),
                "sanctuary_id"=>$sanctuaryID,
                "caretaker_id"=>$user->caretaker->id,
            ]);
        }
        return redirect()->route('caretaker.requestSupply.list');
    }
}
