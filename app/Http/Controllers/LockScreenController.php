<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LockScreenController extends Controller
{
    public function get(){
        if(Auth::check()){
            Session::put('locked', true);

            return view('lockScreen');
        }

        return redirect('/login');
    }

    public function post(Request $request)
    {
    // if user in not logged in 
        if(!Auth::check())
            return redirect('/login');

        $password = $request->password;

        if(Hash::check($password,Auth::user()->password)){
            Session::forget('locked');
            return redirect('/dashboard');
        }
    }
}
