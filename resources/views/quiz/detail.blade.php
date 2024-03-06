@extends('template')
@section('title')
    صفحه اصلی سایت من
@endsection
@section('content')


    <div class="grid grid-cols-7 gap-4 ">
        <div class="col-span-7 lg:col-span-1 md:col-span-2 m-4 flex items-center px-auto">
            <img src="../ejtemae.webp" class="w-[100px] h-[150px] md:w-[150px] md:h-[200px] rounded-md border-b-4 hidden md:block border-r-4 border-dashed border-purple-500" alt="">
        </div>
        <div class="col-span-7 lg:col-span-6 md:col-span-5 p-4 bg-white rounded-md m-4 border-2 border-dashed border-purple-500">
            <h2 class="text-lg m-2 text-right">{{$quiz->title}}</h2>
            <div class="flex">
              <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{$quiz->category->title}}</span>
            </div>
            <ul class="mb-5">
                <li class="text-sm p-2">
                    <span class="px-2   block ">تعداد سوالات  : {{$quiz->total_questions}}</span>
                </li>

                <li class="text-sm p-2">
                    <span class="px-2   block ">زمان : {{$quiz->quiz_time}} دقیقه</span>

                </li>
            </ul>
 @if(!\Illuminate\Support\Facades\Auth::check())
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>

                    <div>
                        <span class="font-medium">وارد نشدی که!</span> برای آزمون دادن باید وارد سایت بشی.
                    </div>
                </div>
                <a href="/quiz/exam/{{$quiz->id}}" class="p-2 bg-gray-400 rounded-md px-6 hover:shadow-md  " disabled>شروع آزمون</a>

            @else
                <a href="/quiz/exam/{{$quiz->id}}" class="p-2 bg-green-600 rounded-md px-6 hover:bg-transparent hover:border-2 hover:border-green-600 hover:text-green-600 hover:shadow-md hover:shadow-green-500 ">شروع آزمون</a>

            @endif
                 </div>

    </div>
    <div class="w-100 p-5 bg-white rounded-md m-10 flex flex-wrap">
        <span class="text-sm m-2"><img src="../1999625.png" alt="" class="w-[20px] inline-flex"> {{$quiz->creator->name}}</span>
        <span class="text-sm m-2 text-blue-600"><img src="../7845466.png" alt="" class="w-[20px] inline-flex "> بروزرسانی شده در {{$quiz->updated_at}}</span>
    </div>

@endsection
