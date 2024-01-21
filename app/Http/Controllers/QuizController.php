<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quize\createQuizeRequest;
use App\Models\Admin;
use App\Models\Answer;
use App\Models\Code;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function Create(createQuizeRequest $request)
    {
        $teacherORadmin = '';
        if (auth()->guard('admin')->check())
            $teacherORadmin = 'admin' ;
        elseif (auth()->guard('teacher')->check())
            $teacherORadmin = 'teacher' ;


        Quiz::create([
            'title' => $request->input('quiz_title'),
            'creator_type' => $teacherORadmin ,
            'creator_id' => Auth()->guard($teacherORadmin)->user()->id ,
            'category_id' => $request->input('categories')
        ]);
         $quiz = Quiz::where('title',$request->input('quiz_title'))->where('creator_type' , $teacherORadmin )->where('creator_id' , Auth()->guard($teacherORadmin)->user()->id )->where('category_id' , $request->input('categories') )->first();
        for ($i = 1; $i <= $request->input('countQuestion'); $i++) {
        Question::create([
            'title' => $request->input("question_title_$i"),
            'quiz_id' => $quiz->id ,
        ]);
            $Question = Question::where('title',$request->input("question_title_$i"))->where('quiz_id' , $quiz->id )->first();
            for ($j = 0; $j < 4; $j++) {
                dd($request->input("true_answer_$i" , []) , $j , $i);
            Answer::create([
                'question_id' => $Question->id ,
                'body' => $request->input("answer_${i}_${j}_title"),
                'is_true_answer' => $request->input("true_answer_$i"),
]);
        }}
dd('kk');
    }
}
