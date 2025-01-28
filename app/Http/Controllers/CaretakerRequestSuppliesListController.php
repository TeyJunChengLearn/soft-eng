<?php

namespace App\Http\Controllers;

use App\Models\Sanctuary;
use Illuminate\Http\Request;
use App\Models\SupplyRequest;
use Illuminate\Support\Facades\Auth;

class CaretakerRequestSuppliesListController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Get the sanctuary IDs that the caretaker manages
        $sanctuaryIDs = Sanctuary::where("manager_id", "=", $user->caretaker->manager_id)->pluck("id");

        $query = SupplyRequest::whereIn("sanctuary_id", $sanctuaryIDs);

        // Check if a search query exists
        if ($request->filled('search')) {
            $search = $request->input('search');

            // Apply the search filter
            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('title', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Order by creation date and paginate results
        $supplyRequests = $query->orderBy('created_at', "desc")->paginate(5);

        $page = "requestSupplies";

        return view("CaretakerRequestSuppliesList", compact("supplyRequests", "page"));
    }

}
