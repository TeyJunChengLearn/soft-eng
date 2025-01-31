<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminManageUserListController extends Controller
{
    public function index(request $request){
        $query = User::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('role', 'LIKE', "%{$searchTerm}%");
        }

        $users = $query->paginate(20);
        $page="manageUsers";
        return view('AdminManageUsersList',compact('users','page'));
    }
}
