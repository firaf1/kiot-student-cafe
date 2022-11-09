<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('pages.property.register');
    }
    public function securtyDashboard()
    {
        return view('pages.dashboard.securtyDashboard');
    }
    public function property()
    {
         return view('pages.property.property');
    }
    public function propertyReport()
    {
         return view('pages.property.property-report');
    }
}
