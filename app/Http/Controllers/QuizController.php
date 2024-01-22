<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quiz\CreateQuizRequest;
use App\Http\Requests\Quize\createQuizeRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
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
                'total_questions'  => $request->input('countQuestion')
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
//            for ($i = 1; $i <= $request->input('countQuestion'); $i++)
//            {
//                $question = Question::create([
//                    'title'   => $request->input("question_title_$i"),
//                    'quiz_id' => $quiz->id ,
//                ]);
//                for ($j = 0; $j < 4; $j++)
//                {
//                    Answer::create([
//                        'question_id'    => $question->id ,
//                        'body'           => $request->input("answer_${i}_${j}_title"),
//                        'is_true_answer' => $request->input("true_answer_$i"),
//                    ]);
//                }
//            }

            DB::commit();
            dd('سوالات با موفقیت اد شد'); //TODO Fix UI
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            Log::error("Error On Call Create Quiz, Message:{$exception->getMessage()} Questions: ". print_r($request->input('questions'), true) ." Answers: ". print_r($request->input('answers'), true) .", Params: " . print_r($request->all(), true));
            return redirect()->back()->withErrors('مشکلی رخ داده لطفا با پشتیبانی تماس بگیرید'); //TODO Show Message
        }
    }
}
