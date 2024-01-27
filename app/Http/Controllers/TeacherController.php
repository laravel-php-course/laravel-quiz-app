<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quiz\CreateQuizRequest;
use App\Http\Requests\Quize\handleEditQuizRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeacherController extends Controller
{
    public function ShowQuizCreateForm()
    {
        return view('teacher.create_quiz');
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
