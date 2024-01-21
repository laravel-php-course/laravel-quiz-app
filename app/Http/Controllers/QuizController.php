<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quiz\CreateQuizRequest;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function ShowCreateForm()
    {
        return view('quiz.create');
    }

    public function Create(CreateQuizRequest $request)
    {
        dd($request->all());
    }
}
