<!doctype html>
<html dir="rtl">
<head>
    <link href="{{ asset('images/logo.png') }}" rel="icon">


    <!-- css -->

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
<nav class="flex items-center justify-center flex-wrap bg-white border-2 p-6  fixed w-full">

    <div class="  flex items-center w-auto justify-center">
        <div class="text-sm flex-grow">
            <a href="#responsive-header" class="inline-block md:text-l text-xs mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                زمان باقی مانده : <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300" id="timer">{{$quiz->quiz_time}}</span>

                <script>
                    var timeLimitInMinutes = document.getElementById('timer').innerText;
                    var timeLimitInSeconds = timeLimitInMinutes * 60 - 10;
                    var timerElement = document.getElementById('timer');

                    function startTimer() {
                        timeLimitInSeconds--;
                        var minutes = Math.floor(timeLimitInSeconds / 60);
                        var seconds = timeLimitInSeconds % 60;

                        if (timeLimitInSeconds < 0) {
                            timerElement.textContent = '00:00';
                            clearInterval(timerInterval);
                            document.getElementById('form').submit();
                            return;

                        }

                        if (minutes < 10) {
                            minutes = '0' + minutes;
                        }
                        if (seconds < 10) {
                            seconds = '0' + seconds;
                        }

                        timerElement.textContent = minutes + ':' + seconds;
                    }

                    var timerInterval = setInterval(startTimer, 1000);

                </script>


            </a>
            <a href="#responsive-header"  class="inline-block md:text-l text-xs mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                سوالات بدون پاسخ : <span id="total_questions" class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$quiz->total_questions}}</span>
            </a>
            <a href="#responsive-header" class="inline-block md:text-l text-xs mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                سوالات نشان شده : <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">0</span>
            </a>
        </div>
    </div>
</nav>
@php
    $quiz_number = 1;
         if (!empty($errors)){

                                    echo $errors ;
                            }
         $i = 0
@endphp
<form method='POST' id="form" action="{{ route('quiz.submit') }}" class=" bg-white border-2 p-6 m-5 mt-20">
    @csrf

    <input type="hidden" value="{{ $code }}" name="quiz_code">
    <input type="hidden" value="{{$quiz->quiz_time}}" name="quiz_time">
    @foreach($quiz->questions as $question)
        <div>
            @php $i++ @endphp
            <h1 class="text-xl text-gray-900 m-2 mb-5">
                {{ $quiz_number . "- " . $question->title }}
            </h1>
            <div class=" p-2">
                @foreach($question->answers as $answer)
                    <div class="flex w-1/4 m-2 items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                        <input id="bordered-radio-2" type="radio" onclick="checked_answer({{$i}})" value="{{ $answer->id }}" name="answers[{{ $question->id }}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ $answer->body }}
                        </label>
                    </div>
                @endforeach
                <div class="border-b-2 w-"></div>
            </div>
        </div>
    @endforeach

    <button type="button" onclick="openModal()" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">اتمام ازمون</button>


    <div id="popup-modal" class="hidden fixed md:inset-0  ">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" onclick="closeModal()" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only" >Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">شما <span id="span"></span>سوال نزده دارین ایا میخواهید ازمون رو تمام کنید؟     </h3>
                    <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        تایید و اتمام ازمون
                    </button>

                </div>
            </div>
        </div>
    </div>
</form>

</body>
</html>

<script>
    let totalQuestions =  document.getElementById("total_questions").innerText;

    let clicked = [] ;
    function checked_answer(i) {

        if (clicked[i] !== 'clicked'){
            clicked[i] = 'clicked'
            document.querySelector("#total_questions").innerText = totalQuestions-1 ;
            totalQuestions =  document.querySelector("#total_questions").innerText;
            document.querySelector("#span").innerText = totalQuestions;
        }
    }
    function closeModal() {

            document.querySelector("#popup-modal").classList.add('hidden') ;

    }
    function openModal() {

        document.querySelector("#popup-modal").classList.remove('hidden') ;

    }

</script>

