<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
<h1 class="text-2xl text-gray-900">{{$quiz->title}}</h1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                #
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
            <td class="px-6 py-4">
{{$i}}
            </td>

            <td class="px-6 py-4">
                @foreach(explode(',',$data->answers) as $Answer)
                    @foreach($answers as $answer_quiz)
                        @foreach($answer_quiz as $answer)
                            @if($Answer == $answer->id)
                                @if(round($Answer/4) == $Answer/4-0.25)
                                    @if($question->id == $answer->question_id)
                                        {{'جواب شما'}}
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
                                    {{'جواب درست'}}
                                @endif
                            @endif
                        @endif
                    @endforeach
                @endforeach

            </td>
                <td class="px-6 py-4">
                    @foreach(explode(',',$data->answers) as $Answer)
                        @foreach($answers as $answer_quiz)
                        @foreach($answer_quiz as $answer)
                            @if($Answer == $answer->id)
                                @if(round($Answer/4) == $Answer/4+0.5)
                                        @if($question->id == $answer->question_id)
                                            {{'جواب شما'}}
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
                                            {{ 'جواب درست'}}
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                </td>
                <td class="px-6 py-4">
                    @foreach(explode(',',$data->answers) as $Answer)
                        @foreach($answers as $answer_quiz)
                        @foreach($answer_quiz as $answer)
                            @if($Answer == $answer->id)
                                @if(round($Answer/4) == $Answer/4+0.25)
                                        @if($question->id == $answer->question_id)
                                            {{'جواب شما'}}
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
                                            {{'جواب درست'}}
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                </td>
                <td class="px-6 py-4">
                    @foreach(explode(',',$data->answers) as $Answer)
                        @foreach($answers as $answer_quiz)
                        @foreach($answer_quiz as $answer)
                            @if($Answer == $answer->id)
                                @if(round($Answer/4) == $Answer/4)
                                        @if($question->id == $answer->question_id)
                                            {{'جواب شما'}}
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
                                                {{'جواب درست'}}
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach

                </td>
            @endforeach
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>

