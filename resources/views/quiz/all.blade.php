@extends('template')
@section('title')
    صفحه اصلی سایت من
@endsection
@section('content')

    <div class="grid grid-cols-4 lg:mx-14 mx-4 gap-4 p-4">
        <div class="col-span-4 flex items-center hidden md:flex">
            <img src="{{ asset('images/—Pngtree—flat character online exam_6641277.png')}}" class="w-[200px]" alt="">
            <h3 class="text-4xl justify-center ">آزمون آنلاین</h3>
        </div>
        <div class="md:col-span-1 col-span-4 border-2 border-purple-500 rounded-md w-100 p-4 rounded-xl border-l-4 border-b-4">
            <h4 class="text-lg font-bold text-center mb-4 ">فیلتر ها </h4>
            <hr class="border-1 border-purple-600 ">
            <form class="max-w-sm mx-auto mt-4" action="/quiz/all/filtered" method="get">
                <label for="countries_disabled" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">فیلتر :</label>
                <select id="countries_disabled" name="filter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($Category as $options)
                    <option value="{{$options->id}}">{{$options->title}}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-green-600 p-4 m-4 mr-0 rounded-lg">تایید</button>
            </form>

        </div>
        <div class="md:col-span-3 col-span-4">
            @foreach($quizzes as $quiz)
            <a href="/quiz/quiz/{{$quiz->id}}" class="bg-purple-700 rounded-xl w-full grid grid-cols-12  mt-2">
                <div class="col-span-1"></div>
                <div class="col-span-11">
                    <h2 class="md:text-lg text-sm font-bold m-2 text-right m-4 text-white">{{$quiz->title}}<h2>
                    <div class="bg-white shadow-lg shadow-white rounded-tr-xl rounded-bl-md  w-full p-4">
                        <span class="bg-purple-100 text-purple-800 md:text-sm text-2xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">{{$quiz->category->title}}</span>



                        <div class="relative  m-2 mt-4 rounded-xl border-2">
                            <table class="w-full md:text-sm text-2xs text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                <thead class="md:text-sm text-2xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="md:px-6 md:py-3 px-2">
                                        تعداد سوالات
                                    </th>
                                    <th scope="col" class="md:px-6 md:py-3 px-2">
                                        سطح دشواری
                                    </th>
                                    <th scope="col" class="md:px-6 md:py-3 px-2">
                                        مدت زمان
                                    </th>

                                </tr>
                                </thead>
                                <tbody class="border-t-2">
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th class="md:px-6 md:py-4 px-2">
                                        {{$quiz->total_questions}}
                                    </th>
                                    <td class="md:px-6 md:py-4 px-2">
                                        سخت
                                    </td>
                                    <td class="md:px-6 md:py-4 px-2">
                                        {{$quiz->quiz_time}}
                                    </td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class=" flex flex-wrap">
                            <span class="md:text-sm text-2xs m-2 text-purple-600"><img src="{{ asset('images/1999625.png')}}" alt="" class="md:w-[20px] w-[10px] inline-flex">          {{$quiz->creator->name}}</span>
                            <span class="md:text-sm text-2xs m-2 text-purple-600"><img src="{{ asset('images/1157077.png')}}" alt="" class="md:w-[20px] w-[10px] inline-flex"> نوع آزمون : نوبت اول</span>
                            <span class="md:text-sm text-2xs m-2 text-purple-600"><img src="{{ asset('images/7845466.png')}}" alt="" class="md:w-[20px] w-[10px] inline-flex">          {{$quiz->updated_at}}</span>
                        </div>
                    </div>

                </div>


            </a>
            @endforeach
        </div>
    </div>

@endsection
