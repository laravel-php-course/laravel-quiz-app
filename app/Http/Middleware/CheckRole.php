<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if (in_array('user', $role) && Auth::check())
        {
            return $next($request);
        }
        elseif (in_array('admin', $role) && Auth::guard('admin')->check())
        {
            return $next($request);
        }
        elseif (in_array('teacher', $role) && Auth::guard('teacher')->check())
        {
            return $next($request);
        }
        return redirect("/registration")->with('error', 'Unauthorized');
    }
}
