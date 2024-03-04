@extends('template')
@section('title')
    صفحه اصلی سایت من
@endsection
@section('content')

    <div class="grid grid-cols-3 md:m-5 " >
        <div class="col-span-3 lg:col-span-2 bg-white border-dashed border-2 border-purple-600 p-3 rounded-md m-5" >
            <h2 class="md:text-3xl text-lg m-3 text-purple-700">اخرین ازمون ها :</h2>
            @foreach($quizzes as $quiz)


            <a href="{{ route('quiz.ShowExam', ['quiz' => $quiz->id]) }}"  class="w-full  gird grid-cols-2 flex bg-white items-center">
                <img src="../ejtemae.webp" alt="" class="md:h-[200px] md:w-[150px] h-[100px] w-[75px] m-2 rounded-md" >
                <div class="w-full p-3">
                    <h1 class="md:text-2xl text-md m-3">   {{ $quiz->title }}</h1>
                    <h4 class="md:text-sm text-xs text-purple-700">{{ $quiz->creator->name }}</h4>
                    <div class="relative overflow-x-auto border-2 rounded-md">
                        <table class="w-full md:text-sm text-xs text-gray-500 text-center">
                            <thead class="text-2xs md:text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class=" md:px-6 px-3  md:py-3 py-2 text-2xs md:text-xs">تعداد سوالات</th>
                                <th scope="col" class=" md:px-6 px-3  md:py-3 py-2 text-2xs md:text-xs">سطح دشواری</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white">
                                <th scope="row" class=" md:px-6 px-3  md:py-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-2xs md:text-xs">{{ $quiz->total_questions }} </th>
                                <th scope="row" class=" md:px-6 px-3  md:py-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-2xs md:text-xs">{{ $quiz->category->title }}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </a>
                <div class="border-dashed m-2 border-b-2 bg-white mx-16 border-purple-600"></div>
            @endforeach



        </div>
        <div class="col-span-3 lg:col-span-1">
            <div class="border-dashed border-2 bg-white border-purple-600 p-3 rounded-md m-5">
                <h2 class="md:text-3xl text-lg m-3 text-purple-700">اخرین تکلیف ها :</h2>


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <tbody>
                        <tr class="bg-white dark:bg-gray-800 text-xs md:text-sm">
                            <th scope="col" class="md:px-6 px-3 md:py-3 p-2 rounded-s-lg">ریاضی</th>
                            <th scope="row" class="md:px-6 px-3 md:py-4 p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">صفحه 17 تا 22 حل شود</th>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800 text-xs md:text-sm">
                            <th scope="col" class="md:px-6 px-3 md:py-3 p-2 rounded-s-lg">هندسه</th>
                            <th scope="row" class="md:px-6 px-3 md:py-4 p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">صفحه 24 تا 29 حل شود</th>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800 text-xs md:text-sm">
                            <th scope="col" class="md:px-6 px-3 md:py-3 p-2 rounded-s-lg">فیزیک</th>
                            <th scope="row" class="md:px-6 px-3 md:py-4 p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">پرسش کلاسی از درس 2</th>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="border-dashed border-2 bg-white border-purple-600 p-3 rounded-md m-5">
                <h2 class="md:text-3xl text-lg m-3 text-purple-700">اخرین پرسش ها :</h2>

@foreach($topices as $topic)
                <div class="border-2 m-2 p-2  flex items-center">
                    <img src="../profile-picture-5 (1).jpg" class="rounded-full m-2 w-[30px] h-[30px] col-span-1" alt="">
                    <div class="justify-right">
                        <h4 class="md:text-lg text-sm align-middle whitespace-nowrap overflow-hidden w-[150px]" style="text-overflow: ellipsis;">
                            {{$topic->title}}</h4>
                        <span class="md:text-sm text-2xs text-gray-600"> بازدید : 123</span>
                        <span class="md:text-sm text-2xs text-gray-600"> ریپلای :         @php
                                echo App\Models\Replay::where("topic_id" , $topic->id)->count();
                            @endphp</span>
                        <span class="md:text-sm text-2xs text-gray-600"> لایک :         @php
                                echo App\Models\Like::where("topic_id" , $topic->id)->count() - App\Models\disLike::where("topic_id" , $topic->id)->count();
                            @endphp</span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>


    </div>



    <div class="md:m-32 m-6">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative md:h-96 h-56 overflow-hidden rounded-lg ">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../photo1707545723 (1).jpeg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 h-full" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="../photo1707545723.jpeg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 h-full" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
            </button>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>

</div>
@endsection
