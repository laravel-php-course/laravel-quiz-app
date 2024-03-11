@extends('template')
@section('content')

<div class="grid grid-cols-4 lg:mx-14 mx-4 gap-4 md:p-4 my-2">
    <div class="col-span-4 flex items-center hidden md:flex">
        <img src="{{ asset('images/topic_icon.png')}}" class="w-[200px]" alt="">
        <h3 class="text-4xl justify-center ">پرسش و پاسخ</h3>
    </div>
    <div class="md:col-span-1 col-span-4 border-2 border-purple-500 rounded-md w-100 p-4 rounded-xl border-l-4 border-b-4">
        <h4 class="md:text-lg text-xs font-bold text-center mb-4 ">فیلتر ها </h4>
        <hr class="border-1 border-purple-600 ">
        <form  action="{{route('topics.all.filtered')}}" method="get" class="flex md:block flex-wrap" >

            @foreach($categories as $category)
                <div class="flex items-center mt-4 m-2">
                    <label for="purple-checkbox" class="ml-2 md:text-lg text-xs font-medium text-gray-900 dark:text-gray-300">{{ $category->title }} </label>
                    <input  id="purple-checkbox" value="{{ $category->id }}" name="category_id" type="radio" class="w-5 h-5 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                </div>
            @endforeach
            <input type="submit" class="bg-green-600 p-2 text-white rounded-lg block" value="تایید">
        </form>

    </div>
    <div class="md:col-span-3 col-span-4">
        @php

                 if (!empty($errors)){

                                            echo $errors ;
                                    }
                 $i = 0
        @endphp
        <a data-modal-target="crud-modal" data-modal-toggle="crud-modal"  class="h-16 bg-purple-700 cursor-pointer flex justify-center items-center font-medium text-xl rounded-xl group text-white border-2 border-purple-700 hover:bg-white hover:text-purple-700 transition duration-200 hover:shadow-lg">
            ثبت پرسش جدید
            <svg class="mr-2" width="39" height="39" viewBox="0 0 42 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="stroke-current text-white transition duration-200 dark:group-hover:text-purple-450 group-hover:text-purple-700" d="M16.293 20.7224H21.0723M25.8517 20.7224H21.0723M21.0723 20.7224V15.943V25.5017" stroke-width="2.53025" stroke-linecap="round" stroke-linejoin="round"></path>
                <path class="stroke-current text-white transition duration-200 dark:group-hover:text-purple-450 group-hover:text-purple-700" opacity="0.5" d="M7.9995 20.7225C7.9995 23.6454 8.15777 25.908 8.54928 27.6696C8.93759 29.4168 9.53832 30.5928 10.3702 31.4247C11.2021 32.2566 12.3781 32.8573 14.1253 33.2456C15.887 33.6372 18.1495 33.7954 21.0725 33.7954C23.9954 33.7954 26.2579 33.6372 28.0196 33.2456C29.7668 32.8573 30.9428 32.2566 31.7747 31.4247C32.6066 30.5928 33.2073 29.4168 33.5956 27.6696C33.9871 25.908 34.1454 23.6454 34.1454 20.7225C34.1454 17.7995 33.9871 15.537 33.5956 13.7754C33.2073 12.0281 32.6066 10.8521 31.7747 10.0202C30.9428 9.18833 29.7668 8.58759 28.0196 8.19928C26.2579 7.80778 23.9954 7.64951 21.0725 7.64951C18.1495 7.64951 15.887 7.80778 14.1253 8.19928C12.3781 8.58759 11.2021 9.18833 10.3702 10.0202C9.53832 10.8521 8.93759 12.0281 8.54928 13.7754C8.15777 15.537 7.9995 17.7995 7.9995 20.7225Z" stroke-width="2.53025" stroke-linecap="round" stroke-linejoin="round">
                </path>
            </svg>
        </a>



        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 ">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            ایجاد تاپیک جدید
                        </h3>
                        <button type="button" class=" text-gray-400 bg-transparent hover:bg-gray-200 cursor-pointer hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('topics.create.submit.form') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان</label>
                                <input type="text" name="title"  id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="تمرین 20 فصل 2 ریاضی دهم" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">دسته بندی</label>
                                <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">متن تاپیک</label>
                                <textarea id="description" rows="4" name="body" class="block
                           p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="این تمرین رو هرچی حل میکنم ..."></textarea>
                            </div>
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            ایجاد تاپیک
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @foreach($topics as $topic)
            <a href="/topics/show/{{$topic->id}}" class="bg-purple-700 rounded-xl w-full grid grid-cols-12 md:m-2 my-2">
                <div class="col-span-1"></div>
                <div class="col-span-11">
                    <div class="flex m-2  flex-nowrap items-center ">
                        <img src="{{ asset('images/profile.png')}}" class="md:w-[60px] md:h-[60px] w-[40px] h-[40px] rounded-full border-4 md:m-2 m-1 border-gray-100" alt="">
                        <div>
                            <h3 class="md:text-2xl text-lg md:m-2 text-white font-bold" >{{$topic->users->name}}</h3>
                            <span class="md:text-sm text-2xs block md:m-2 text-white"><span class="text-blue-400 font-bold">4 ساعت پیش</span> توسط <span class="text-blue-400 font-bold">{{$topic->users->name}}</span> بروزرسانی شد</span>
                        </div>

                    </div>
                    <div class="bg-white shadow-lg shadow-white rounded-tr-xl rounded-bl-md  w-full p-4">

                        <h3 class="text-purple-700 md:text-xl text-md font-bold">{{$topic->title}}</h3>
                        <p class="text-md text-gray-800 m-4 md:block hidden whitespace-nowrap overflow-hidden w-[400px]" style="text-overflow:ellipsis">{{$topic->body}}</p>


                        <div class="inline-flex rounded-md shadow-sm" role="group">
                            <button type="button" class="md:px-4 px-2 md:py-2 py-1 flex items-center md:text-sm text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 bg-purple-200 text-purple-700">
                                <img src="{{ asset('images/icons8-reply-arrow-24.png')}}" class="w-[15px] m-1" alt="">
                                @php
                                    echo App\Models\Replay::where("topic_id" , $topic->id)->count();
                                @endphp پاسخ

                            </button>
                            <button type="button" class="md:px-4 px-2 md:py-2 py-1 flex items-center md:text-sm text-xs font-medium text-gray-900 bg-white border-t border-b border-l rounded-l-lg -full border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 bg-purple-200 text-purple-700">
                                اطلاعات بیشتر
                                <img src="{{ asset('images/icons8-left-48.png')}}" class="w-[15px] m-1" alt="">
                            </button>
                        </div>

                    </div>

                </div>

            </a>
        @endforeach

    </div>
</div>

@endsection
