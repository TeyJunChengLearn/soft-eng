<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminViewFeedbackController extends Controller
{
    public function index(request $request){
        $query = Feedback::orderBy("created_at","desc");
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('details', 'LIKE', "%{$searchTerm}%");
        }
        $page= "feedbackView";
        $feedbacks = $query->paginate(3);
        return view('AdminFeedbackList',compact('feedbacks','page'));
    }
}
