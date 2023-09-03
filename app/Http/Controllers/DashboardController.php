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

    public function profile() {
        return view('admin.profile');
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = auth()->user();
        if (!\Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }
        $user->password = \Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Password updated successfully');
    }



}
