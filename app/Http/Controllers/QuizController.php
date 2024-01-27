<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quiz\CreateQuizRequest;
use App\Http\Requests\Quize\createQuizeRequest;
use App\Http\Requests\Quize\handleEditQuizRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    public function ShowExam(Request $request)
    {
        return view('quiz.quizPage');
    }

    public function DeleteExam(Request $request , $quiz)
    {

        $foundedQuiz = Quiz::find($quiz);
        $foundedQuiz->delete();
        $CreatorType = BaseService::getCreatorType();
        return redirect()->route($CreatorType[1].'.show.all.quiz');
    }

    public function Create(createQuizRequest $request)
    {
//        dd($request->all());
        $creatorType = BaseService::getCreatorType();

        try {
            DB::beginTransaction();

            $quiz = Quiz::create([
                'title'            => $request->input('quiz_title'),
                'creator_type'     => $creatorType[0] ,
                'creator_id'       => auth()->guard($creatorType[1])->id(),
                'category_id'      => $request->input('categories'),
                'total_questions'  => $request->input('countQuestion') ,
                'quiz_time'        => $request->input('quiz_time')
            ]);

            foreach ($request->input('questions') as $q)
            {
                $question = Question::create([
                    'title'   => $q['title'],
                    'quiz_id' => $quiz->id ,
                ]);

                foreach ($q['answers'] as $key => $bodyAnswer)
                {
                    Answer::create([
                        'question_id'    => $question->id ,
                        'body'           => $bodyAnswer,
                        'is_true_answer' => $q["true_answer"] == $key
                    ]);
                }
            }

            DB::commit();
            return redirect()->route($creatorType[1].'.show.all.quiz');
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            Log::error("Error On Call Create Quiz, Message:{$exception->getMessage()} Questions: ". print_r($request->input('questions'), true) ." Answers: ". print_r($request->input('answers'), true) .", Params: " . print_r($request->all(), true));
            return redirect()->back()->with(['errors' => 'مشکلی رخ داده لطفا با پشتیبانی تماس بگیرید']);
        }
    }


    public function handleEditQuiz(handleEditQuizRequest $request)
    {
//        dd($request->all());
        $creatorType = BaseService::getCreatorType();

        try {
            DB::beginTransaction();
            foreach ($request->input('questions') as $q)
            {
                $questions = Question::where('quiz_id' , $request->input('quiz_id'))->get();

                foreach ($questions as $question ) {
                    foreach ($q['title'] as $key => $title)
                    {
                        if ($key == $question->id){
                            $question->title = $title;
                            $question->save();
                        }}
                    foreach ($q['answers'] as $key => $bodyAnswer)
                    {

                        $Answers = Answer::where('question_id' , $question->id)->get();
                        foreach ($Answers as $Answer ) {
                            if ($key == $Answer->id){
                                $Answer->body = $bodyAnswer;
                                $Answer->is_true_answer = $q["true_answer"] == $key;
                                $Answer->save();
                            }}}


                }}

            DB::commit();
            return redirect()->route($creatorType[1].'.show.all.quiz');
        }
        catch (\Exception $exception)
        {
            dd("Error On Call Create Quiz, Message:{$exception->getMessage()} Questions: ". print_r($request->input('questions'), true) ." Answers: ". print_r($request->input('answers'), true) .", Params: " . print_r($request->all(), true));
            DB::rollBack();
            Log::error();
            return redirect()->back()->with(['errors' => 'مشکلی رخ داده لطفا با پشتیبانی تماس بگیرید']);
        }
    }

}
