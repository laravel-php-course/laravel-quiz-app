<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function Home()
    {
        $quizzes = Quiz::all();
        return view('index', ['quizzes' => $quizzes]);
    }
    public function registration()
    {
        return view('registration');
    }
}
