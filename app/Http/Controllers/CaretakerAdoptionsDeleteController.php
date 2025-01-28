<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Adoption;
use App\Models\Sanctuary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaretakerAdoptionsDeleteController extends Controller
{
    public function delete(Request $request,$sanctuaryID,$catID){
        $user = Auth::user();

        // Validate that the user is authorized to delete
        $sanctuaryIDs = Sanctuary::where('manager_id', '=', $user->caretaker->manager_id)->pluck('id');

        // Check if the adoption record exists
        $adoption = Cat::find($catID)->adoption;
        if (!$adoption) {
            return redirect()->route('caretaker.adoptions.catList', ['sanctuaryID' => $sanctuaryID])
                             ->withErrors(['Adoption record not found.']);
        }

        // Delete the adoption record
        $adoption->delete();

        // Redirect with a success message
        return redirect()->route('caretaker.adoptions.catList', ['sanctuaryID' => $sanctuaryID]);
    }
}
