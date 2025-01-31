<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cat;
use App\Models\Sanctuary;
use App\Models\CatActivity;
use Illuminate\Http\Request;
use App\Models\SanctuaryTask;
use App\Models\SupplyRequest;
use Illuminate\Support\Facades\Auth;

class ManagerViewAnalyticsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $managerID = $user->manager->id; // Get the authenticated user's manager ID

        $startDate = Carbon::now()->subDays(6)->startOfDay(); // Ensures 7 days including today
        $endDate = Carbon::now()->endOfDay();

        // Get all sanctuary IDs managed by this manager
        $sanctuaryIDs = Sanctuary::where("manager_id", $managerID)->pluck('id');
        $catIDs = Cat::whereIn('sanctuary_id', $sanctuaryIDs)->pluck('id');

        // Get tasks count per day
        $sanctuaryTasks = SanctuaryTask::whereIn('sanctuary_id', $sanctuaryIDs)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        // Get supply requests count per day
        $supplyRequests = SupplyRequest::whereIn('sanctuary_id', $sanctuaryIDs)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        // Get cat activities count per day
        $catActivities = CatActivity::whereIn('cat_id', $catIDs)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        // Generate last 7 days
        $dates = [];
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates[] = $date;

            // Sum the counts from all three datasets
            $chartData[$date] =
                ($sanctuaryTasks[$date] ?? 0) +
                ($supplyRequests[$date] ?? 0) +
                ($catActivities[$date] ?? 0);
        }

        // Print for debugging
        // dd([
        //     'dates' => $dates,
        //     'chartData' => $chartData
        // ]);

        // Prepare dataset for the chart
        $datasets = [
            'label' => "Total Activities for Manager {$managerID}",
            'data' => array_values($chartData), // Extract values
            'borderColor' => 'rgba(0, 0, 255, 1)',
            'fill' => false,
            'lineTension' => 0,
        ];

        $page = "viewAnalytics";
        return view('ManagerViewAnalytics', compact('dates', 'datasets', 'page'));
    }
}
