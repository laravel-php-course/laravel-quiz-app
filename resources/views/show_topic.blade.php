<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="">
<nav class="flex items-center justify-between flex-wrap bg-gray-100 p-6">
    <div class="flex items-center flex-shrink-0 text-purple-500 mr-6">
        <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
        <span class="font-semibold text-xl tracking-tight">Tailwind CSS</span>
    </div>
    <div class="block md:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-purple-500 border-purple-500 hover:text-white hover:border-white hover:bg-purple-500">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div class="w-full block flex-grow md:flex md:items-center md:w-auto">
        <div class="text-sm md:flex-grow">
            <a href="#responsive-header" class="mt-4 md:mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                آزمون ها
            </a>
            <a href="#responsive-header" class="mt-4 md:mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                سوالات
            </a>
            <a href="#responsive-header" class="mt-4 md:mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                دبیران
            </a>
            <a href="{{ route('topics.all.form') }}" class="mt-4 md:mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                تالار گفتمان
            </a>
        </div>
        <div>
            @if(auth()->check())
                <a href="/" class="inline-block btn">پروفایل</a>
                <a href="{{route('user.logOut')}}" class="inline-block btn bg-red-500">خروج</a>
            @elseif(auth()->guard('teacher')->check())
                <a href="teacher/dashboard" class="inline-block btn">  استاد پروفایل</a>
                <a href="{{route('teacher.auth.Logout')}}" class="inline-block btn bg-red-500">خروج</a>
            @else
                <a href="/registration" class="inline-block btn">ثبت نام / ورود</a>
            @endif

        </div>
    </div>
</nav>
<section class="w-full">
    <div class="px-24">
        <div class="mb-6 bg-gray-100 mt-5 rounded-2xl shadow-lg pt-10 pb-8 md:px-16 px-5">
            <div class="mb-8">
                <div class="flex items-start justify-between md:flex-row flex-col">
                    <div class="flex items-center sm:self-center self-start sm:flex-row flex-col justify-center sm:text-right text-center sm:mb-0 mb-5 sm:w-auto w-full">
                        <div >
                            <div class="w-24 h-24 flex bg-gray-300 group relative rounded-full overflow-hidden border-4 border-solid border-gray-100">
                                <a href="/@azimzadeh1398">
                                    <img class="transition duration-200 transform group-hover:scale-110 w-full h-full lozad" data-src="https://roocket.ir/img/default.png" alt="user-avatar" src="https://roocket.ir/img/default.png" data-loaded="true">
                                    <div class="w-full h-full absolute top-0 right-0 bg-biscay-700 bg-opacity-20 z-0"></div>
                                </a>
                            </div>
                        </div>

                        <div class="flex flex-col sm:mr-4 sm:mt-0  mt-3">
                            <a href="/@azimzadeh1398" class="dark:text-white text-gray-800 hover:text-blue-700 transition duration-200 font-semibold text-3xl mb-2">عظیم زاده</a>
                            <div class="flex items-center text-gray-300 text-lg sm:flex-row flex-col">
                                <div><span data-time-realtime="2024-02-01 15:54:38">1 ساعت پیش</span>
                                    توسط <a href="/@azimzadeh1398" class="text-blue-500 font-medium hover:underline">عظیم زاده</a>
                                    مطرح شد</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center sm:self-center self-end sm:justify-end justify-center sm:w-auto w-full">
                        <div class="flex space-x-reverse space-x-3">
                        </div>
                        <div class="flex items-center">
                            <a href="#replies-list" class="flex items-center px-5 py-1.5 rounded-lg bg-white mr-3 border border-opacity-0 border-white text-gray-450 group font-normal text-lg justify-center transition duration-200 hover:text-gray-50 hover:bg-gray-700">
                                <svg class="ml-2" width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="currentColor" d="M8.12134 11.7807L4.13281 7.7599L8.12134 3.73914" stroke-width="1.48905" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path stroke="currentColor" d="M16.8961 16.6058V10.9767C16.8961 10.1236 16.5599 9.30549 15.9615 8.70226C15.3631 8.09902 14.5515 7.76013 13.7053 7.76013H4.13281" stroke-width="1.48905" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                4 پاسخ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-6 sm:text-right text-center">
                <h1 class="dark:text-white text-gray-800 font-bold md:text-4xl sm:text-3xl text-28 mb-5 md:leading-68">
                    تبدیل عکس به کد عددی
                </h1>
                <div class="content-area text-gray-800 dark:bg-dark-910 bg-gray-200 px-8 py-2 rounded-lg">
                    <p>سلام<br>
                        گاهاً دیده میشه لوگوی سایتی به جای اینکه تصویر باشه یک عدد طولانی هست که با svg شروع شده<br>
                        چگونه میشه لوگوی سایت را به چنین کدی تبدیل کرد؟<br>
                        ممنون بابت پاسگویی&zwnj;تان</p>
                </div>
            </div>
            <hr class="border-gray-300 border-opacity-20  mb-5">
            <div class="flex items-center justify-between lg:flex-row flex-col">
                <div class="flex items-center sm:space-x-2 sm:space-y-0 space-y-2 sm:space-x-reverse lg:mb-0 mb-5 sm:flex-row flex-col justify-center ">
                </div>
            </div>
        </div>
        <div>
            <div id="subject-99520">
                <div class="flex items-center rounded-xl px-4 pt-9 pb-6 shadow-lg bg-gray-100">
                    <div class="w-full">
                        <div class="flex items-center justify-between mb-6 md:flex-row flex-col">
                            <div class="flex items-start sm:self-center self-start">
                                <div>
                                    <div class="w-16 h-16 flex bg-gray-300 group relative rounded-full overflow-hidden border-4 border-solid border-gray-100">
                                        <a href="/@saghari">
                                            <img class="transition duration-200 transform group-hover:scale-110 w-full h-full lozad" data-src="https://static.roocket.ir/images/avatar/2023/4/17/9GBsXURIUMnn5xtHD1kJgQb1XmVjJRcihdCW4kEi.png" alt="user-avatar" src="https://static.roocket.ir/images/avatar/2023/4/17/9GBsXURIUMnn5xtHD1kJgQb1XmVjJRcihdCW4kEi.png" data-loaded="true">
                                            <div class="w-full h-full absolute top-0 right-0 bg-biscay-700 bg-opacity-20 z-0"></div>
                                        </a>
                                    </div>
                                </div>

                               <div class="flex flex-col mr-4">
                                    <a href="/@saghari" class="font-semibold dark:text-white text-gray-800 hover:text-blue-700 duration-200 transition text-2xl mb-2">محمد حسین</a>
                                    <div class="flex sm:flex-row flex-col sm:items-center items-start">
                                        <div class="relative group dark:text-gray-920 text-gray-300 text-sm font-medium sm:pl-2 md:ml-2 md:mb-0 mb-1.5 sm:border-l border-gray-300 border-opacity-20 last:ml-0 last:pl-0 w-fit-content last:border-0 flex items-center">
                                            <span class="ml-1">تخصص :</span>
                                            <span>
                                                mevn stack
                                            </span>
                                        </div>
                                        <i class="bg-gray-300 bg-opacity-20 sm:flex hidden h-5 w-px mx-2"></i>

                                        <a href="/@saghari" class="mt-1 dark:text-gray-920 text-gray-300 ltr hover:text-gray-450 font-normal text-sm">@saghari</a>
                                        <i class="bg-gray-300 bg-opacity-20 sm:flex hidden h-5 w-px mx-2"></i>
                                        <span class="flex sm:mt-0 mt-1 items-center dark:text-gray-920 text-gray-300 font-normal text-sm">
                                        <svg class="ml-1" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.84823 1.48975H4.15253C2.51615 1.48975 1.49023 2.64837 1.49023 4.288V8.71233C1.49023 10.352 2.51073 11.5106 4.15253 11.5106H8.84769C10.4895 11.5106 11.5111 10.352 11.5111 8.71233V4.288C11.5111 2.64837 10.4895 1.48975 8.84823 1.48975Z" stroke="currentColor" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8.33679 7.59301L6.5 6.49722V4.13501" stroke="currentColor" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <span data-time-realtime="2024-02-01 17:04:25">43 دقیقه پیش</span>
                                            <span class="mr-0.5">مطرح شد</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center sm:self-center self-end sm:mt-0 mt-3">


                                <div class="group cursor-pointer relative dark:hover:border-white border  border-transparent dark:bg-dark-890 dark:bg-opacity-100 bg-blue-700 bg-opacity-10 w-10 h-10 rounded-lg flex items-center justify-center ml-3  group transition duration-200 hover:bg-opacity-100">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="stroke-current transition text-blue-700 duration-200 group-hover:text-white" d="M13.8349 4.75C14.7972 3.08333 17.2028 3.08333 18.1651 4.75L26.8253 19.75C27.7876 21.4167 26.5848 23.5 24.6603 23.5H7.33974C5.41524 23.5 4.21243 21.4167 5.17468 19.75L13.8349 4.75Z" stroke="#3B82F6"></path>
                                        <path class="fill-current transition text-blue-700 duration-200 group-hover:text-white" d="M16.9072 12.7257C16.9072 13.2341 16.9022 13.6865 16.892 14.083C16.8818 14.4693 16.8666 14.8353 16.8462 15.181C16.8259 15.5165 16.8005 15.8469 16.77 16.1722C16.7497 16.4874 16.7242 16.8178 16.6937 17.1635H15.9312C15.9007 16.8178 15.8652 16.4874 15.8245 16.1722C15.794 15.8571 15.7686 15.5267 15.7482 15.181C15.7279 14.8353 15.7076 14.4693 15.6872 14.083C15.6771 13.6865 15.672 13.2341 15.672 12.7257V10.8042H16.9072V12.7257ZM16.3125 20C15.7838 20 15.5195 19.7306 15.5195 19.1917C15.5195 18.8969 15.5856 18.6885 15.7177 18.5665C15.8601 18.4343 16.0583 18.3682 16.3125 18.3682C16.5667 18.3682 16.7598 18.4343 16.892 18.5665C17.0242 18.6885 17.0902 18.8969 17.0902 19.1917C17.0902 19.7306 16.831 20 16.3125 20Z" fill="#3B82F6" fill-opacity="0.7"></path>
                                    </svg>
                                    <div class="hidden group-hover:visible bg-blue-700 absolute p-2 group-hover:flex items-center justify-center w-20 h-9 rounded-md -top-14">
                                        <span class="text-white font-normal text-xs">
                                            گزارش تخلف
                                        </span>
                                        <div class="absolute -bottom-2 right-1/2 transform border-blue-700 translate-x-2/4 c-triangle-down"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex flex-col items-center">
                                <div>
                                    <div class="flex flex-col p-3 pt-5 pr-0 text-xl items-center space-y-2">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-7 h-7 text-gray-300 cursor-pointer hover:text-blue-700 ">
                                                <path fill="currentColor" d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z" class=""></path>
                                            </svg>
                                        </div>
                                        <div class="font-semibold ltr text-xl text-gray-500 ">0</div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-7 h-7 text-gray-300 cursor-pointer hover:text-blue-700 ">
                                                <path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z" class=""></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex items-start">
                                    <div class="content-area reply_item text-gray-800 w-full">
                                        <p>این تگ svg هست که اگه html بلد باشی باهاش آشنایی داری<br>
                                            معمولا خودشون نمیسازن و کانورت میکنن<br>
                                            گوگل کن png to svg میتونی آنلاین انجام بدی اینکارو </p>
                                    </div>
                                </div>
                                <hr class="border-gray-210 border-opacity-20 mt-8 mb-5">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center flex-wrap -mb-2 !space-x-reverse sm:space-x-2 space-x-0 w-full">
                                        <a href="#send-answer" class="flex justify-center sm:mb-0 mb-2 h-10 items-center p-4 rounded-md last:ml-0 bg-blue-700 dark:text-blue-450 dark:hover:text-white bg-opacity-10 dark:bg-dark-890  text-blue-700 hover:text-white transition duration-200 hover:bg-opacity-100 sm:w-fit-content w-full">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" opacity="0.4" d="M12.02 2C6.21 2 2 6.74 2 12C2 13.68 2.49 15.41 3.35 16.99C3.51 17.25 3.53 17.58 3.42 17.89L2.75 20.13C2.6 20.67 3.06 21.07 3.57 20.91L5.59 20.31C6.14 20.13 6.57 20.36 7.081 20.67C8.541 21.53 10.36 21.97 12 21.97C16.96 21.97 22 18.14 22 11.97C22 6.65 17.7 2 12.02 2Z"></path>
                                                <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M11.9802 13.2901C11.2702 13.2801 10.7002 12.7101 10.7002 12.0001C10.7002 11.3001 11.2802 10.7201 11.9802 10.7301C12.6902 10.7301 13.2602 11.3001 13.2602 12.0101C13.2602 12.7101 12.6902 13.2901 11.9802 13.2901ZM7.36984 13.2901C6.66984 13.2901 6.08984 12.7101 6.08984 12.0101C6.08984 11.3001 6.65984 10.7301 7.36984 10.7301C8.07984 10.7301 8.64984 11.3001 8.64984 12.0101C8.64984 12.7101 8.07984 13.2801 7.36984 13.2901ZM15.31 12.0101C15.31 12.7101 15.88 13.2901 16.59 13.2901C17.3 13.2901 17.87 12.7101 17.87 12.0101C17.87 11.3001 17.3 10.7301 16.59 10.7301C15.88 10.7301 15.31 11.3001 15.31 12.0101Z"></path>
                                            </svg>
                                            <span class="font-medium text-sm mr-1">ارسال پاسخ</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

