<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ادمین پنل | صفحه اصلی</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-900">
<nav class="bg-gray-100 flex items-center p-2 ">
    <img src="{{ asset('images/profile-picture-5 (1).jpg')}}" class="rounded-full w-[30px] h-[30px] m-2" alt="">
    <h3 class="lg:text-sm md:text-xs font-bold text-gray-900">کوروش خلیلی</h3>

    <button class="mr-auto m-2" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
        <img src="{{ asset('images/icons8-hamburger-menu-50.png')}}" class="w-[30px] h-[30px]  md:hidden" alt="">
    </button>


    <!-- drawer component -->
    <div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-4 overflow-y-auto">
            <ul class="mt-10" >

                <li class="text-gray-900  lg:text-sm md:text-xs @yield('quiz') md:m-2 md:p-4 hover:bg-gray-200 rounded-lg m-2 p-4" id="teacher-2">
                    <a href="/teacher/quiz/showAll">
                        <div class="flex items-center">
                            <img src="{{ asset('images/icons8-exam-60.png')}}" class="w-[20px] h-[20px] mx-2" alt="">
                            <span>امتحانات</span></div></a>
                </li>
                <li class="text-gray-900  lg:text-sm md:text-xs @yield('add_quiz') md:m-2 md:p-4 hover:bg-gray-200 rounded-lg m-2 p-4" id="teacher-2">
                    <a href="/teacher/add/quiz/">
                        <div class="flex items-center">
                            <img src="{{ asset('images/icons8-add-50.png')}}" class="w-[20px] h-[20px] mx-2" alt="">
                            <span>افزودن امتحان</span></div></a>
                </li>

            </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>
<div class="grid grid-cols-5 bg-gray-900 ">
    <div class="md:col-span-1 hidden md:block col-span-5 bg-gray-100 m-5 rounded-lg p-2 w-100  h-25">
        <ul class="mt-10" >

            <li class="text-gray-900  lg:text-sm md:text-xs md:m-2 @yield('quiz') md:p-4 hover:bg-gray-200 rounded-lg m-2 p-4" id="teacher-2">
                <a href="/teacher/quiz/showAll">
                    <div class="flex items-center">
                        <img src="{{ asset('images/icons8-exam-60.png')}}" class="w-[20px] h-[20px] mx-2" alt="">
                        <span>امتحانات</span></div></a>
            </li>
            <li class="text-gray-900  lg:text-sm md:text-xs md:m-2 @yield('add_quiz') md:p-4 hover:bg-gray-200 rounded-lg m-2 p-4" id="teacher-2">
                <a href="/teacher/add/quiz/">
                    <div class="flex items-center">
                        <img src="{{ asset('images/icons8-add-50.png')}}" class="w-[20px] h-[20px] mx-2" alt="">
                        <span>افزودن امتحان</span></div></a>
            </li>

        </ul>
    </div>
    <div class="md:col-span-4 col-span-5">
        @yield('content')
    </div>

</div>
</body>
<script>

    document.getElementById('teacher-2').addEventListener('mouseover' ,function() {
        document.getElementById('dropdown-2').classList.remove('hidden')
    })
    document.getElementById('teacher-2').addEventListener('mouseout' ,function() {
        document.getElementById('dropdown-2').classList.add('hidden')
    })
    document.getElementById('teacher-3').addEventListener('mouseover' ,function() {
        document.getElementById('dropdown-3').classList.remove('hidden')
    })
    document.getElementById('teacher-3').addEventListener('mouseout' ,function() {
        document.getElementById('dropdown-3').classList.add('hidden')
    })

</script>
</html>
