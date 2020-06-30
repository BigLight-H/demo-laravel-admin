<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthLogin
{
    /**
     * The Guard implementation.
     *
     * @var Guard|AdminGuard
     */
    protected $auth;


    /**
     * @param Guard|AdminGuard $auth
     */
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) { //判断用户是否登录
            return redirect('login');
        }
        return $next($request);
    }
}
