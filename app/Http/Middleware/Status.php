<?php

namespace App\Http\Middleware;

use App\Models\Regional;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Status
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->userDate->change_password == 0) {
            return redirect('change_password');
        }

        if (Auth::user()->userDate->verify_data == 0) {
            return redirect('verify_data');
        }   

        return $next($request);

    }
}
