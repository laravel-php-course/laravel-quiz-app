<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
<nav class="flex items-center justify-center flex-wrap bg-white border-2 p-6 m-5">

    <div class="  flex items-center w-auto justify-center">
        <div class="text-sm flex-grow">
            <a href="#responsive-header" class="inline-block md:text-l text-xs mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                زمان باقی مانده : <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">25 دقیقه</span>
            </a>
            <a href="#responsive-header" class="inline-block md:text-l text-xs mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                سوالات بدون پاسخ : <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">12</span>
            </a>
            <a href="#responsive-header" class="inline-block md:text-l text-xs mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                سوالات نشان شده : <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">0</span>
            </a>
        </div>
    </div>
</nav>
@php
    $quiz_number = 1;
@endphp
<form method='POST' action="{{ route('quiz.submit') }}" class=" bg-white border-2 p-6 m-5">
    @csrf
    <input type="hidden" value="{{ $code }}" name="quiz_code">
    @foreach($quiz->questions as $question)
        <div>
            <h1 class="text-xl text-gray-900 m-2 mb-5">
                {{ $quiz_number . "- " . $question->title }}
            </h1>
            <div class=" p-2">
                @foreach($question->answers as $answer)
                    <div class="flex w-1/4 m-2 items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                        <input id="bordered-radio-2" type="radio" value="{{ $answer->id }}" name="answers[{{ $question->id }}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ $answer->body }}
                        </label>
                    </div>
                @endforeach
                <div class="border-b-2 w-"></div>
            </div>
        </div>
    @endforeach
    <button class="px-4 py-2 rounded bg-red-500" type="submit">
        اتمام آزمون
    </button>
</form>
<?php
//TODO Add modal for confirmed end quiz and show how many question user doesnt anse=wer
?>
</body>
</html>

