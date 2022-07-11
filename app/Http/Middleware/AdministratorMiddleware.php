<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class AdministratorMiddleware
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

    protected $administrator;

    public function __construct(Guard $auth){
        $this->administrator = $auth;
    }

    public function handle($request, Closure $next,$guard = 'administrator')
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
