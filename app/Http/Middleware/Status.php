<?php

namespace App\Http\Middleware;

use App\Models\Regional;
use Closure;
use Illuminate\Http\Request;
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
        if(auth()->user()->userDate->change_password == false) {
            return redirect('change_password');
        }

        if(auth()->user()->userDate->verify_data == false) {
            return redirect('verify_data');
        }

        return $next($request);
    }
}
