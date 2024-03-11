@extends('admin.template')

@section('title')
    پیشخوان
@endsection
@section('quiz')
bg-gray-200
@endsection





@section('content')



    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-900 dark:bg-gray-900 p-4">
        <label class="text-white">جستوجو :</label>
        <input type="text" id="table-search-users" class="rounded-lg ml-auto m-2 px-3" placeholder="چی رو میخوای ؟">

        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-8000 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:text-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">فیلتر</span>
                فیلتر
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700  dark:bg-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-900">پذیرفته شده ها</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-900">رد شده ها</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-900">در انتظار تایید ها</a>
                    </li>
                </ul>

            </div>
        </div>

    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4 text-gray-900">

        <table class="w-full text-sm text-left rtl:text-right text-gray-8000 dark:text-gray-400 ">
            <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    عنوان
                </th>

                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    دسته بندی
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    طراح
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    تعداد سوالات
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    تاریخ ایجاد
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    تاریخ ویرایش
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    ویرایش
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    حذف
                </th>
            </tr>

            </thead>
            <tbody>

            @foreach($quizzes as $quiz)
                <tr class="bg-gray-100 border-b dark:text-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">

                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-gray-900">
                        <div class="ps-3">
                            <div class="text-base font-semibold text-xs md:text-md">{{ $quiz->title }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4  text-xs md:text-md">
                        {{ $quiz->category->title }}
                    </td>
                    <td class="px-6 py-4  text-xs md:text-md">
                        {{ $quiz->creator->name }}
                    </td>
                    <td class="px-6 py-4 text-xs md:text-md">
                        {{ $quiz->total_questions }}
                    </td>
                    <td class="px-6 py-4 text-xs md:text-md">
                        {{ $quiz->created_at }}
                    </td>
                    <td class="px-6 py-4  text-xs md:text-md">
                        @if($quiz->updated_at ==  $quiz->created_at)
                            <span class="text-red-600">ندارد</span>
                        @else
                            {{ $quiz->updated_at }}
                        @endif

                    </td>
                    <td class="px-6 py-4 text-xs md:text-md">
                        <a href="/quiz/del/quiz/{{$quiz->id}}" class="bg-red-400 text-l p-3 rounded-2xl hover:bg-red-600 hover:shadow-2xl hover:text-white">حذف</a>

                    </td>
                    <td class="px-6 py-4 text-xs md:text-md">
                        <a href="/admin/edit/quiz/{{$quiz->id}}" class="bg-yellow-400 text-l p-3 rounded-2xl hover:bg-yellow-600 hover:shadow-2xl hover:text-white">ویرایش</a>

                    </td>

                </tr>



            @endforeach
            </tbody>
        </table>
    </div>

    </div>


@endsection
