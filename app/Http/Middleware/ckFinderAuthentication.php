<?php

namespace App\Http\Middleware;

use Closure;

class ckFinderAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::check()) {
        //     config(['ckfinder.authentication' => function () use ($request) {
        //         return true;
        //     }]);
        // } else {
        //     config(['ckfinder.authentication' => function () use ($request) {
        //         return false;
        //     }]);
        // }

        // return $next($request);

        config(['ckfinder.authentication' => function () {
            return true;
        }]);
        return $next($request);

    }
}
