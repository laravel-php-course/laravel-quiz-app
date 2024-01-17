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
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($role === 'user' && Auth::check())
        {
            return $next($request);
        }
        elseif ($role === 'admin' && Auth::guard('admin')->check())
        {
            return $next($request);
        }
        elseif ($role === 'teacher' && Auth::guard('teacher')->check())
        {
            return $next($request);
        }

        return redirect("/$role/login")->with('error', 'Unauthorized');
    }
}
