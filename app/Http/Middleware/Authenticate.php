<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (request()->is('panel/*')) {
                return route('loginadmin');
            } else if (request()->is('panelsatker/*')) {
                return route('loginsatker');
            } else if (request()->is('datasatker/*')) {
                return route('loginsatker');
            } else if (request()->is('satker/*')) {
                return route('loginsatker');
            } else {
                //return route('login');
                return route('loginsatker');
            }
        }
    }
}
