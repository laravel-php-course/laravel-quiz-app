<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

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

    public function ShowAllTopics()
    {
        return view('all_topics', [
            'categories' => Category::all(['id', 'title']),
            'jalali' => Jalalian::forge('now - 10 minutes')->ago()
        ]);
    }

    public function ShowTopic()
    {
        return view('show_topic');
    }
}
