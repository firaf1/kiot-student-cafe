<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardContorller extends Controller
{
    public function superAdmin()
    {
        $totalCafeStudent = Student::where('type', 'cafe')->count();
        $totalNonCafeStudent = Student::where('type', 'non-cafe')->count();
    $totalStudent = Student::all()->count();
    $todayStudent = Student::whereDate('created_at', Carbon::today())->count();
    $weekStudent = Student::select("*")
    ->whereBetween('created_at',
        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
    )
    ->count();
    $monthStudent = Student::whereMonth('created_at', date('m'))
    ->whereYear('created_at', date('Y'))
    ->count();
    $totalUser = User::all()->count();
        return view('pages.dashboard.superAdmin', compact('totalCafeStudent','todayStudent', 'totalStudent', 'weekStudent', 'monthStudent', 'totalStudent','totalUser', 'totalNonCafeStudent'));
    }


    public function storeAdmin()
    {
        return view('pages.dashboard.storeAdmin');
    }
    public function betDashboard()
    {
        return view('pages.dashboard.betDashboard');
    }

    public function requestItem()
    {
        return view('pages.store.requestItem');
    }
    public function storeReport()
    {
        return view('pages.store.storeReport');
    }
}
