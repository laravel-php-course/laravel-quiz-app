<?php

namespace App\Http\Middleware;

use App\Models\Quiz;
use App\Models\QuizAction;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkQuizTime
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $quiz_time = intval($request->input('quiz_time'));
        $quiz_action = QuizAction::where('code' ,$request->input('quiz_code'))->where('created_at' , '>' , now()->subMinute($quiz_time))->count();

        if ($quiz_action == 1){

            return $next($request);
        }
        return redirect("/")->with('error', 'تایم ازمون تموم شده است');
    }
}
