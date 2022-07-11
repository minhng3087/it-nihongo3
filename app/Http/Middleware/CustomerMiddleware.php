<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }

    protected $customer;

    public function __construct(Guard $auth){
        $this->customer = $auth;
    }

    public function handle($request, Closure $next,$guard = 'customer')
    {
        if (Auth::guard($guard)->guest()) {

            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('getDangnhap');
            }
        }

        return $next($request);
    }
}
