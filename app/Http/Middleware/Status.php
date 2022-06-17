<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserController;
use App\Models\Regional;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

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
        
        if (!Auth::check())
            return redirect()->route('login');

        $user = Auth::user()->userDate;
        //dd($request->route()->named('home'));
       
        if ($user->change_password == 0)
            return redirect('change_password');

        if ($user->verify_data == 0)
            return redirect('verify_data');

        return $next($request);  

    }
}
