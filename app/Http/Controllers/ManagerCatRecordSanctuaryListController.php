<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCatRecordSanctuaryListController extends Controller
{
    public function index(Request $request){
        $user= Auth::user();
        $query = Sanctuary::where('manager_id','=',$user->manager->id);
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('address', 'like', '%' . $searchTerm . '%');
            });
        }
        $sanctuaries = $query->paginate(20);
        $page="catRecords";
        return view("ManagerCatRecordSanctuaryList", compact('sanctuaries',"page"));
    }
}
