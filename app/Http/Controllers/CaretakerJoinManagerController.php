<?php

namespace App\Http\Controllers;

use App\Models\Caretaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaretakerJoinManagerController extends Controller
{
    public function index(Request $request){
        return view('CaretakerRequestJoinManager');
    }

    public function join(Request $request){
        $user= Auth::user();
        $caretaker = Caretaker::find($user->caretaker->id);
        $caretaker->manager_id = $request->manager_id;
        $caretaker->save();
        return redirect()->route('caretaker.catActivity.sanctuaryList');

    }
}
