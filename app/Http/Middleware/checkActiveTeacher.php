<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkActiveTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $status = Auth()->guard('teacher')->user()->status ;
        if ($status == 'Active'){
            return $next($request);
        }

        return redirect("/")->with('notActive', 'حساب کاربری شما فعال نیس برای اطلاعات بیشتر با پشتیبانی تماس بگیرید');
    }
}
