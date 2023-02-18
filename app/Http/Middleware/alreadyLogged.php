<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class alreadyLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       if(Auth::check()) {
        if (Auth::user()->role == '1') {
            return redirect(route('superAdminDashboard'));
        } elseif(Auth::user()->role == '2'){
            return redirect(route('storeDashboard'));
        }

         elseif(Auth::user()->role == '3'){
            return redirect(route('betDashboard'));
        }
        elseif(Auth::user()->role == '0'){
            return redirect(route('add-user'));
        }
        elseif(Auth::user()->role == '4'){
            return redirect(route('securtyDashboard'));
        }
        elseif(Auth::user()->role == '5'){
            return redirect(route('schedules'));
        }
       }
       return $next($request);
    }
}
