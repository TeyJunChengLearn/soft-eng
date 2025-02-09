<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Caretaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCaretakerRecordListController extends Controller
{
    public function index(request $request){
        $user = Auth::user();
        $page="caretakerRecords";
        $userIDs = Caretaker::where('manager_id',"=", $user->manager->id)->pluck('user_id');
        $query=User::whereIn('id',$userIDs);
        if($request->has('search')){
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('email', 'like', '%' . $searchTerm . '%')
                ->orWhere('username','like','%' . $searchTerm . '%');
            });
        }
        $userIDs =$query->pluck('id');

        $caretakers =Caretaker::whereIn('user_id',$userIDs)->paginate(20);
        return view('ManagerCaretakerRecordList',compact('page','caretakers','user'));
    }
}
