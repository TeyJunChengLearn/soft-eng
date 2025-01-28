<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaretakerAdoptionsSanctuaryListController extends Controller
{
    public function index(request $request){
        $user = Auth::user();
        $managerID= Manager::where('id','=',$user->caretaker->manager_id)->first()->id;
        $query = Sanctuary::where('manager_id','=',$managerID);
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('address', 'like', '%' . $searchTerm . '%');
            });
        }
        $page = "adoptions";
        $sanctuaries = $query->paginate(20);

        return view('CaretakerAdoptionsSanctuaryList',compact('sanctuaries','page'));
    }
}
