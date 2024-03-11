<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quiz\CreateQuizRequest;
use App\Http\Requests\Quize\handleEditQuizRequest;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Topic;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeacherController extends Controller
{
    public function ShowQuizCreateForm()
    {
        $cat = Category::all();
        return view('teacher.create_quiz')->with('category' , $cat);
    }

    public function showAllTopics(Request $request, $type)
    {
        $user = '';
        if (auth()->check()){
            $user = Auth::id();
        }elseif (auth()->guard('teacher')->check()){
            $user = Auth::guard('teacher')->id();

        }elseif (auth()->guard('admin')->check()){
            $user = Auth::guard('admin')->id();
        }
        if (!in_array($type, ['UnAccept', 'Suspend']))
            $status = Topic::STATUS;
        elseif ($type == 'UnAccept')
            $status = [Topic::PENDING];
        else
            $status = [Topic::SUSPEND];

        $topics = Topic::whereIn('status', $status)->get();
        return view('teacher.all_topics', ['topics' => $topics]);
    }

    public function ShowAllQuiz(Request $request)
    {
        $quizzes = Quiz::getCreator(config("services.paginate.low"));

        return view('teacher.all_quizzes', ['quizzes' => $quizzes]);
    }

    public function ShowEdit(Request $request , $quiz)
    {
        $Answers = [];
        $Questions = Question::where('quiz_id',$quiz)->get();
        foreach ($Questions as $answer ) {
            $Answer = Answer::where('question_id',$answer->id)->get();
            foreach ($Answer as $answers ) {
                $Answers[$answers->id] = $answers ;
            }

}
        return view('teacher.edit_quiz')->with(['Questions' => $Questions , 'Answers' => $Answers]);
    }






}
