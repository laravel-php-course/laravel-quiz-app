<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function ShowAll(Request $request)
    {
        return view('topic.all_topices');
    }
    public function ShowTopic(Request $request)
    {
        return view('topic.topic');
    }
}
