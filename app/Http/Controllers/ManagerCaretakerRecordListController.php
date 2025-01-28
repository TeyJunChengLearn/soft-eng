<?php

namespace App\Http\Controllers;

use App\Models\Caretaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCaretakerRecordListController extends Controller
{
    public function index(request $request){
        $user = Auth::user();
        $page="caretakerRecords";
        $query = Caretaker::where('manager_id',"=", $user->manager->id);
        if($request->has('search')){
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('email', 'like', '%' . $searchTerm . '%')->orWhere('username','like','%' . $searchTerm . '%');
            });
        }
        $caretakers = $query->paginate(20);
        return view('ManagerCaretakerRecordList',compact('page','caretakers','user'));
    }
}
