<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandleReplayLikeRequest;
use App\Http\Requests\HandleReplayRequest;
use App\Http\Requests\Topic\CreateTopicRequest;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Replay;
use App\Models\Replaydislike;
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
    public function HandleReplay(HandleReplayRequest $request)
    {
        $Replay = Replay::create([
            'body'         => $request->comment,
            'topic_id'  => $request->hidden,
            'title'  => 'باید تایتل رو حذف کنم',
            'creator_id'   => $request->user()->id
        ]);
        return redirect("/topics/show/$request->hidden");
    }

    public function ShowAllTopics()
    {


        return view('all_topics', [
            'categories' => Category::all(['id', 'title']),
            'jalali' => '10',
            'topics' => Topic::with('users' , 'replays')->where('status' , 'Active')->paginate(10)
        ]);
    }
    public function ShowAllTopicsFiltered(Request $request)
    {

        return view('all_topics', [
            'categories' => Category::all(['id', 'title']),
            'jalali' => '10',
            'topics' => Topic::with('users' , 'replays')->where('status' , 'Active')->where('category_id' , $request->category_id)->paginate(10)
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

        $topic = Topic::create([
            'body'         => $request->body,
            'title'        => $request->title,
            'category_id'  => $request->category,
            'creator_id'   => $request->user()->id
        ]);
        return redirect("/topics/all")->with(['msg' => 'تاپیک با موفقیت ساخته شد بعد از بازبینی توسط ادمین انتشار داده خواهد شد و با پیامک به شما اطلاع داده خوهد شد']);
        dd($topic);
    }

    public function HandleReplayLike(HandleReplayLikeRequest $request)
    {
        $reply = Replay::findOrFail($request->input('replayID'));
        $ReplayLike = ReplayLike::where('topic_id',$reply->topic_id)->where('creator_id' , auth()->id())->where('replay_id',$reply->id)->count();

if ($ReplayLike == 0){
        $like = ReplayLike::create([
            'topic_id'     => $reply->topic_id,
            'creator_id'   => auth()->id(),
            'replay_id'    => $reply->id
        ]);
    }else{
    ReplayLike::where('topic_id',$reply->topic_id)->where('creator_id' , auth()->id())->where('replay_id',$reply->id)->delete();
}
        return response()->json(
            ['data' => ReplayLike::where('replay_id' , $request->input('replayID'))->count()-Replaydislike::where('replay_id' ,$request->input('replayID'))->count(),
             'status' => 'success'
                ]
        );
    }

    public function HandleReplayDisLike(HandleReplayLikeRequest $request)
    {
        $reply = Replay::findOrFail($request->input('replayID'));
        $ReplayLike = Replaydislike::where('topic_id',$reply->topic_id)->where('creator_id' , auth()->id())->where('replay_id',$reply->id)->count();

        if ($ReplayLike == 0){
            $like = Replaydislike::create([
                'topic_id'     => $reply->topic_id,
                'creator_id'   => auth()->id(),
                'replay_id'    => $reply->id
            ]);
        }else{
            Replaydislike::where('topic_id',$reply->topic_id)->where('creator_id' , auth()->id())->where('replay_id',$reply->id)->delete();
        }
        return response()->json(
            ['data' => ReplayLike::where('replay_id' , $request->input('replayID'))->count()-Replaydislike::where('replay_id' ,$request->input('replayID'))->count(),
                'status' => 'success'
            ]
        );
    }
}
