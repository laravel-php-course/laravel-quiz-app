<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()){
        return $next($request);
        }elseif (auth()->guard('teacher')->check()){
            return $next($request);
        }elseif (auth()->guard('admin')->check()){
            return $next($request);
        }
        return redirect()->back();
    }
}
