<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\SupplyRequest;
use Illuminate\Support\Facades\Auth;

class ManagerSupplyRequestController extends Controller
{
    public function index(request $request){
        $user = Auth::user();

        // Get the sanctuary IDs that the caretaker manages
        $sanctuaryIDs = Sanctuary::where("manager_id", "=", $user->manager->id)->pluck("id");

        $query = SupplyRequest::whereIn("sanctuary_id", $sanctuaryIDs);

        // Check if a search query exists
        if ($request->filled('search')) {
            $search = $request->input('search');
            // Apply the search filter
            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('item_name', 'like', "%{$search}%")
                         ->orWhere('quantity', 'like', "%{$search}%");
            });
        }

        // Order by creation date and paginate results
        $supplyRequests = $query->orderBy('created_at', "desc")->paginate(5);

        $page = "suppliesRequest";

        return view("ManagerRequestSupplies", compact("supplyRequests", "page"));
    }
}
