<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCatActivitySanctuaryListController extends Controller
{
    public function index(request $request){
        $user= Auth::user();
        $query = Sanctuary::where('manager_id','=',$user->manager->id);
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('address', 'like', '%' . $searchTerm . '%');
            });
        }
        $page = "catActivity";
        $sanctuaries = $query->paginate(20);

        return view('ManagerCatsActivitySanctuaryList',compact('sanctuaries','page'));
    }
}
