<?php

namespace App\Http\Controllers;

use App\Models\Input;
use App\Models\Store;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $inputs = Input::where('status', 'Approved')->get();
        $stores = Store::where('amount', '!=', null)->latest()->paginate(15);
        $taken = Store::where('status', 'Taken')->whereMonth('created_at', Carbon::now()->month)->count();
        $deleted = Store::where('user_id', Auth::user()->id)->where('type', 'Delete')->whereMonth('created_at', Carbon::now()->month)->count();

        return view('pages.dashboard.superAdmin', compact(['totalCafeStudent', 'todayStudent', 'totalStudent',
            'weekStudent',
            'deleted', 'taken', 'stores', 'inputs',
            'monthStudent', 'totalStudent', 'totalUser', 'totalNonCafeStudent']));
    }

    public function storeAdmin()
    {
        $itemAddedByYou = Store::where('user_id', Auth::user()->id)->where('type', 'in')->count();
        $pending = Store::where('user_id', Auth::user()->id)->where('type', 'in')->where('status', 'Pending')->count();
        $approved = Store::where('user_id', Auth::user()->id)->where('type', 'in')->where('status', 'Approved')->count();
        $unapproved = Store::where('user_id', Auth::user()->id)->where('type', 'in')->where('status', 'Unapproved')->count();
        $users = User::where('status', 'Approved')->latest()->paginate(7);
        $inputs = Input::where('status', 'Approved')->get();
        $stores = Store::where('amount', '!=', null)->where('user_id', Auth::user()->id)->latest()->paginate(10);
        $taken = Store::where('user_id', Auth::user()->id)->where('status', 'Taken')->whereMonth('created_at', Carbon::now()->month)->count();
        $deleted = Store::where('user_id', Auth::user()->id)->where('type', 'Delete')->whereMonth('created_at', Carbon::now()->month)->count();

        return view('pages.dashboard.storeAdmin', compact(['itemAddedByYou', 'deleted', 'taken', 'stores', 'inputs', 'pending', 'approved', 'unapproved', 'users']));
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
