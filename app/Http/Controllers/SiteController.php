<?php

namespace App\Http\Controllers;

use App\Http\Requests\Topic\CreateTopicRequest;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Replay;
use App\Models\ReplayLike;
use App\Models\Topic;
use Illuminate\Http\Request;
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
            'jalali' => Jalalian::forge('now - 10 minutes')->ago(),
            'topics' => Topic::paginate(10)
        ]);
    }

    public function ShowTopic(Request $request, $topicId)
    {
        $topic = Topic::findOrFail($topicId);
        return view('show_topic', [
            'topic' => $topic
        ]);
    }

    public function ShowCreateTopic()
    {
        return view('create_topic', [
            'categories' => Category::all()
        ]);
    }

    public function HandleCreateTopic(CreateTopicRequest $request)
    {
        //TODO show errors in ui

        $topic = Topic::create([
            'body'         => $request->body,
            'title'        => $request->title,
            'category_id'  => $request->category,
            'creator_id'   => $request->user()->id
        ]);

        //TODO good response | Topic Must Be Accepted By Admin => Add Column Status Default : pending
        dd($topic);
    }

    public function HandleReplayLike(Request $request) //TODO Custom Validation
    {
        //TODO if like exists => remove like else add it
        $reply = Replay::findOrFail($request->input('replayID'));
        $like = ReplayLike::create([
            'topic_id'     => $reply->topic_id,
            'creator_id'   => auth()->id(),
            'replay_id'    => $reply->id
        ]);

        return response()->json('success');
    }
}
