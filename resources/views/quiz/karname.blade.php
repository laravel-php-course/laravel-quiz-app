@extends('template')
@section('content')
    <h4 class="text md">کارنامه : {{$quiz->title}}</h4>

    <div class="lg:m-20 lg:mx-32 m-5">
    <div class="relative overflow-x-auto ">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 my-5">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg">
                    شرکت کننده
                </th>
                <th scope="col" class="px-6 py-3">
                    تاریخ
                </th>
                <th scope="col" class="px-6 py-3 rounded-e-lg">
                    زمان آزمون
                </th>
                <th scope="col" class="px-6 py-3 rounded-e-lg">
                    نمره
                </th>
                <th scope="col" class="px-6 py-3 rounded-e-lg">
                    سوالات درس
                </th>
                <th scope="col" class="px-6 py-3 rounded-e-lg">
                    سوالات غلط
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$data->user->name}}
                </th>
                <td class="px-6 py-4">
                    {{$time}}
                </td>
                <td class="px-6 py-4">
                    45 دقیقه
                </td>
                <td class="px-6 py-4">
                    {{$score}}
                </td>
                <td class="px-6 py-4">
                    {{$count_true_answer}}
                </td>
                <td class="px-6 py-4">
                    {{$count_false_answer}}
                </td>
            </tr>

            </tbody>

        </table>
    </div>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    شماره سوال
                </th>
                <th scope="col" class="px-6 py-3">
                    1
                </th>
                <th scope="col" class="px-6 py-3">
                    2
                </th>
                <th scope="col" class="px-6 py-3">
                    3
                </th>
                <th scope="col" class="px-6 py-3">
                    4
                </th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 0 ;

            @endphp
            @foreach($questions as $question)
                @php
                    $i++ ;
                @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$i}}
                    </th>
                    <td class="px-6 py-4" id="answer">
                        @foreach(explode(',',$data->answers) as $Answer)
                            @foreach($answers as $answer_quiz)
                                @foreach($answer_quiz as $answer)
                                    @if($Answer == $answer->id)
                                        @if(round($Answer/4) == $Answer/4-0.25)
                                            @if($question->id == $answer->question_id)
                                                <span id="userAnswer1">{{'جواب شما'}}</span>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach

                        @foreach($answers as $answer_quiz)
                            @foreach($answer_quiz as $answer)
                                @if($answer->is_true_answer == 1)
                                    @if(round($answer->id/4) == $answer->id/4-0.25)
                                        @if($question->id == $answer->question_id)
                                            <span id="trueAnswer1">{{'جواب درست'}}</span>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach

                    </td>
                    <td class="px-6 py-4" id="answer">
                        @foreach(explode(',',$data->answers) as $Answer)
                            @foreach($answers as $answer_quiz)
                                @foreach($answer_quiz as $answer)
                                    @if($Answer == $answer->id)
                                        @if(round($Answer/4) == $Answer/4+0.5)
                                            @if($question->id == $answer->question_id)
                                                <span id="userAnswer2">{{'جواب شما'}}</span>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                        @foreach($answers as $answer_quiz)
                            @foreach($answer_quiz as $answer)
                                @if($answer->is_true_answer == 1)
                                    @if(round($answer->id/4) == $answer->id/4+0.5)
                                        @if($question->id == $answer->question_id)
                                            <span id="trueAnswer2">{{'جواب درست'}}</span>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </td>
                    <td class="px-6 py-4" id="answer">
                        @foreach(explode(',',$data->answers) as $Answer)
                            @foreach($answers as $answer_quiz)
                                @foreach($answer_quiz as $answer)
                                    @if($Answer == $answer->id)
                                        @if(round($Answer/4) == $Answer/4+0.25)
                                            @if($question->id == $answer->question_id)
                                                <span id="userAnswer3">{{'جواب شما'}}</span>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                        @foreach($answers as $answer_quiz)
                            @foreach($answer_quiz as $answer)
                                @if($answer->is_true_answer == 1)
                                    @if(round($Answer/4) == $answer->id/4+0.25)
                                        @if($question->id == $answer->question_id)
                                            <span id="trueAnswer3">{{'جواب درست'}}</span>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </td>
                    <td class="px-6 py-4" id="answer">
                        @foreach(explode(',',$data->answers) as $Answer)
                            @foreach($answers as $answer_quiz)
                                @foreach($answer_quiz as $answer)
                                    @if($Answer == $answer->id)
                                        @if(round($Answer/4) == $Answer/4)
                                            @if($question->id == $answer->question_id)
                                                <span id="userAnswer3">{{'جواب شما'}}</span>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach

                        @foreach($answers as $answer_quiz)
                            @foreach($answer_quiz as $answer)
                                @if($answer->is_true_answer == 1)
                                    @if(round($answer->id/4) == $answer->id/4)
                                        @if($question->id == $answer->question_id)
                                            <span id="trueAnswer4">{{'جواب درست'}}</span>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach

                    </td>
                </tr>
                <script>
                    if (document.querySelector('#answer') == 'جواب شما جواب درست')   {
                        document.querySelector('#answer').innerText = 'درست زدی'
                    }

                </script>
            @endforeach

            </tbody>
        </table>
    </div>

</div>

@endsection
