<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function schedule()
    {
        return view('pages.schedule');
    }
    public function TickerStudentReport()
    {
        return view('pages.tickerStudentReport');
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
