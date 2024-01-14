<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="cinematicket, سینما تیکت, بلیط سینما, رزرو بلیط سینما, سینما و تیاتر" name="keywords">
    <meta content="سینما تیکت بزرگترین مرج رزرو و خرید بلیط سینما سراسر کشور" name="description">

    <link href="{{ asset('images/logo.png') }}" rel="icon">

    <title>@yield('title') | داشبورد ادمین سینماتیکت</title>

    <!-- css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link type="text/css" rel="stylesheet" href="{{ url('datePicker/jalalidatepicker.min.css') }}" />
    <script type="text/javascript" src="{{ url('datePicker/jalalidatepicker.min.js') }}"></script>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
    @yield('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body dir="rtl" class="bg-gray-200 overflow-x-hidden">


    @include('.admin.navbar')

    <div class="w-full flex flex-row">
        <div class="basis-2/12 bg-white w-full p-7">
            <ul class="block text-sm">
                <li
                    class="w-full flex flex-row hover:bg-gray-100 rounded-md relative p-2 my-3 {{ url()->current() === route('admin.dashboard') ? 'bg-red-50 text-red-500 ' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="w-full flex flex-row items-center">

                        <div class="text-start flex flex-row items-center w-full mt-1">
                            <i class="fa-brands fa-microsoft"></i>
                            <h1 class="text-black text-md font-normal mr-3">پیشخوان</h1>
                        </div>
                        <div w-full>
                            <i class="  fa-solid fa-chevron-left text-end justify-end  mx-3"></i>
                        </div>
                    </a>

                </li>{{--        FINISHED اضافه کردن ساب منو برای دیدن منو های دبیران مثل لیست تایید نشده همه دبیران
            https://flowbite.com/docs/components/navbar/    --}}
                <li class="w-full flex flex-row hover:bg-gray-100 rounded-md relative p-2 my-3 {{ url()->current() === route('admin.all.teachers.show') ? 'bg-red-50 text-red-500 ' : '' }}">
                        <button id="dropdownLeftButton" data-dropdown-toggle="dropdownLeft" data-dropdown-placement="left" class="w-full flex flex-row items-center" type="button">دبیران</button>

                        <div class="text-start flex flex-row items-center w-full mt-1">
                            <!-- Dropdown menu -->
                            <div id="dropdownLeft" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLeftButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">همه دبیران</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">تایید نشده</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">تایید شده</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <i class="  fa-solid fa-chevron-left text-end justify-end  mx-3"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="basis-10/12">
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <script src="{{ asset('/js/sweet-alert.js') }}"></script>

    @yield('js')

</body>

</html>
