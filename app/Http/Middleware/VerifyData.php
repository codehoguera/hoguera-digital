<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyData
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
        if (auth()->user()->userDate->verify_data == false)
        {
            return redirect('verify_data');
        }

        return $next($request);
    }
}
