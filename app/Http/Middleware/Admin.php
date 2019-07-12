<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        $adminRole = Auth::user()->roles()->pluck('name');//adminを返す　https://laravel.com/docs/5.8/collections#method-pluck
        if($adminRole->contains('admin')){//https://laravel.com/docs/5.8/collections#method-pluck 
            //array何があるかtrueかfalseで判断。adminがあるかどうか
        return $next($request);
        }
    }
}
