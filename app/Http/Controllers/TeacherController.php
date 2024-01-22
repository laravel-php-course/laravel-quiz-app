<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function ShowQuizCreateForm()
    {
        return view('teacher.create_quiz');
    }

    public function ShowAllQuiz(Request $request)
    {
        $quizzes = Quiz::getCreator(5); //TODO ADD config 3 limit paginate [low, medium, large]

        return view('teacher.all_quizzes', ['quizzes' => $quizzes]);
    }
}
