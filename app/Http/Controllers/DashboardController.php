<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function dashboard() {
//// Get the current date
//        $endDate = Carbon::now();
//
//// Go back 6 days (to get a total of 7 days including today)
//        $startDate = Carbon::now()->subDays(30);
//
//// Create a new period
//        $period = Period::create($startDate, $endDate);
//
//// Fetch the data
//        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews($period);
////        dd($analyticsData);
//
//// Format the data into a simple array
//        $activeUsersPerDay = [];
//
//        foreach($analyticsData as $dayData) {
//            $activeUsersPerDay[$dayData['date']->format('Y-m-d')] = $dayData['visitors'];
//        }
//        dd($activeUsersPerDay);
        return view('admin.dashboard');
    }

}
