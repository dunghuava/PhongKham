<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckForUser
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
        if(!Auth::check()){
            if(strtolower($request->method()) == 'post') {
                return response([
                    'status' => 'error',
                    'message' => 'Vui lòng đăng nhập để tiếp tục',
                    'redirect' => '/auth/login'
                ]);
            }
            if($request->path() != 'auth/login') {
                return redirect('/auth/login');
            }
        }
        return $next($request);
    }
}
