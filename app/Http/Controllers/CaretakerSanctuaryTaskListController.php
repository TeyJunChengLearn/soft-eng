<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\SanctuaryTask;
use Illuminate\Support\Facades\Auth;

class CaretakerSanctuaryTaskListController extends Controller
{
    public function index(request $request, $sanctuaryID){
        $page = "sanctuaryTask";
        $user = Auth::user();

        $sanctuaryIDs = Sanctuary::where('manager_id','=',$user->caretaker->manager_id)->pluck('id');
        // dd($sanctuaryIDs->toArray(),$sanctuaryID);
        if(in_array($sanctuaryID,$sanctuaryIDs->toArray())){
            $query = SanctuaryTask::where("sanctuary_id","=", $sanctuaryID)->where('caretaker_id',"=",$user->caretaker->id)->orderBy('created_at', 'desc');
            if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where(function ($q) use ($searchTerm) {
                        $q->where('summary', 'like', '%' . $searchTerm . '%')
                        ->orderBy('created_at', 'desc');
                });
            }
            $sanctuaryTasks = $query->paginate(5);
            return view('CaretakerSanctuaryTaskList', compact('sanctuaryTasks','page','sanctuaryID'));
        }else{
            return redirect()->route('caretaker.sanctuaryTask.sanctuaryList');
        }

    }
}
