<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{

    public function tickerConsuption()
    {
        return view('pages.tickerConsuption');
    }
    public function consumptionReport()
    {
        return view('pages.consumptionReport');
    }
    public function schedule()
    {
        return view('pages.schedule');
    }
    public function TickerStudentReport()
    {
        return view('pages.tickerStudentReport');
    }
    public function RequestStatus()
    {
        return view('pages.requestStatus');
    }
    public function roles()
    {
        return view('pages.roles');
    }
    public function consuption()
    {
        return view('pages.consuption');
    }
    public function storeIndex()
    {
        return view('pages.store');
    }
    public function StoreStatus()
    {
        return view('pages.storeStatus');
    }
    public function outstore()
    {
        return view('pages.outStore');
    }
    public function store()
    {
        return view('pages.store.store');
    }
    public function materials()
    {
        return view('pages.materials');
    }
    public function measurement()
    {
        return view('pages.measurement');
    }
    public function schedules()
    {
        return view('pages.schedules');
    }
    public function user()
    {
        return view('pages.user');
    }
}
