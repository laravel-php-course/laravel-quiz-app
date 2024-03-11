@extends('admin.template')

@section('title')
    ایجاد امتحان
@endsection
{{--@php--}}
{{--if (!empty($errors->all()))--}}
{{--    dd($errors->all());--}}
{{--@endphp--}}
@section('content')
    <section class="p-4">
        <div class="px-2 py-3 bg-white rounded-md shadow-sm">
            <header>
                <h1 class="text-center text-gray-800">
                    ویرایش امتحان
                </h1>
            </header>
            <form action="{{route('handle.edit.quiz')}}" method="post">

                @csrf

                <div class="block w-full w-100" id="question-container">

                    <p class="text-red-600">
                        @php
                            if (!empty($errors)){

                                    echo $errors ;


}
                        @endphp</p>

@foreach($Questions as $question)

                        <div>
                            <label for="question_title_{{$question->id}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان سوال {{$question->id}}</label>
                            <input name="questions[{{$question->id}}][title][{{$question->id}}]" type="text" value="{{$question->title}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="عنوان سوال" required>
                        </div>
                    @php
$radioBtnValue = -1 ;
 @endphp
                            @foreach($Answers as $Answer)

                                @php
                                    $radioBtnValue++ ;
                                    if ($radioBtnValue == 4)
                                        $radioBtnValue= 0 ;
                                @endphp

@if($Answer->question_id == $question->id)
                        <div id="answer-{{$question->id}}-{{$Answer->id}}" class="flex my-2">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 rounded-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <input type="radio" @if($Answer->is_true_answer == 1) checked @endif name="questions[{{$question->id}}][true_answer]" value="{{$Answer->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </span>
                            <input type="text" name="questions[{{$question->id}}][answers][{{$Answer->id}}]" value="{{$Answer->body}}" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>@endif

                            @endforeach
                </div>
                @endforeach
                <div class="block w-full w-100">
                    <input type="hidden" name="quiz_id"  value="{{request('quiz')}}">
                </div>
                <div class="flex justify-center mt-5 w-100">
                    <input class="px-4 py-2 text-white bg-blue-500 rounded-md" type="submit" value="ثبت اطلاعات">
                </div>
            </form>
        </div>
    </section>

@endsection
