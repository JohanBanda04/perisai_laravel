<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        if (auth()->user()->roles=="humas_satker") {
            //return response()->json('Your role is not a Humas Satker Role');
            return $next($request);
        } else if(auth()->user()->roles=="humas_kanwil"){
            return $next($request);
        } else if(auth()->user()->roles=="superadmin" ){
            return $next($request);
        }
        //return $next($request);
        return response()->json('You dont have permission');
    }
}
