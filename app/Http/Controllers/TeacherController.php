<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function ShowQuizCreateForm()
    {
        return view('teacher.create_quiz');
    }
}
