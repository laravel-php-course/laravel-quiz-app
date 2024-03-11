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
        $quizzes = Quiz::latest()->take(2)->get();
        $topices = Topic::latest()->take(3)->get();
        return view('index', ['quizzes' => $quizzes , 'topices' => $topices]);
    }
    public function registration()
    {
        return view('registration');
    }
    public function HandleReplay(HandleReplayRequest $request)
    {
        $user = '';
        if (auth()->check()){
            $user = Auth::id();
        }elseif (auth()->guard('teacher')->check()){
            $user = Auth::guard('teacher')->id();

        }elseif (auth()->guard('admin')->check()){
            $user = Auth::guard('admin')->id();
        }
        $Replay = Replay::create([
            'body'         => $request->comment,
            'topic_id'  => $request->hidden,
            'title'  => 'باید تایتل رو حذف کنم',
            'creator_id'   => $user
        ]);
        return redirect("/topics/show/$request->hidden");
    }

    public function ShowAllTopics()
    {


        return view('all_topics', [
            'categories' => Category::all(['id', 'title']),
            'jalali' => '10',
            'topics' => Topic::with('users' , 'replays')->where('status' , 'Active')->latest()->paginate(10)
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
            'creator_id'   => $user = Auth::id()
        ]);
          return view('notification')->with([
            'message' => 'تاپیک شما با موفقیت اضافه شد باید ادمین تاییدش کنه هروفت تایید شد بهت میگم عزیزم',
            'type'    => 'success',
            'link'    => ['url' => '/topics/all', 'title' => "برگشت به سایت"]
        ]);
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
