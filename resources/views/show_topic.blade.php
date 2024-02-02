<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="">
<nav class="flex flex-wrap items-center justify-between p-6 bg-gray-100">
    <div class="flex items-center flex-shrink-0 mr-6 text-purple-500">
        <svg class="w-8 h-8 mr-2 fill-current" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
        <span class="text-xl font-semibold tracking-tight">Tailwind CSS</span>
    </div>
    <div class="block md:hidden">
        <button class="flex items-center px-3 py-2 text-purple-500 border border-purple-500 rounded hover:text-white hover:border-white hover:bg-purple-500">
            <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div class="flex-grow block w-full md:flex md:items-center md:w-auto">
        <div class="text-sm md:flex-grow">
            <a href="#responsive-header" class="p-3 mt-4 mr-4 font-bold text-purple-500 md:mt-0 hover:bg-purple-500 hover:text-white">
                آزمون ها
            </a>
            <a href="#responsive-header" class="p-3 mt-4 mr-4 font-bold text-purple-500 md:mt-0 hover:bg-purple-500 hover:text-white">
                سوالات
            </a>
            <a href="#responsive-header" class="p-3 mt-4 mr-4 font-bold text-purple-500 md:mt-0 hover:bg-purple-500 hover:text-white">
                دبیران
            </a>
            <a href="{{ route('topics.all.form') }}" class="p-3 mt-4 mr-4 font-bold text-purple-500 md:mt-0 hover:bg-purple-500 hover:text-white">
                تالار گفتمان
            </a>
        </div>
        <div>
            @if(auth()->check())
                <a href="/" class="inline-block btn">پروفایل</a>
                <a href="{{route('user.logOut')}}" class="inline-block bg-red-500 btn">خروج</a>
            @elseif(auth()->guard('teacher')->check())
                <a href="teacher/dashboard" class="inline-block btn">  استاد پروفایل</a>
                <a href="{{route('teacher.auth.Logout')}}" class="inline-block bg-red-500 btn">خروج</a>
            @else
                <a href="/registration" class="inline-block btn">ثبت نام / ورود</a>
            @endif

        </div>
    </div>
</nav>
<section class="w-full">
    <div class="px-24">
        <div class="px-5 pt-10 pb-8 mt-5 mb-6 bg-gray-100 shadow-lg rounded-2xl md:px-16">
            <div class="mb-8">
                <div class="flex flex-col items-start justify-between md:flex-row">
                    <div class="flex flex-col items-center self-start justify-center w-full mb-5 text-center sm:self-center sm:flex-row sm:text-right sm:mb-0 sm:w-auto">
                        <div >
                            <div class="relative flex w-24 h-24 overflow-hidden bg-gray-300 border-4 border-gray-100 border-solid rounded-full group">
                                <a href="/@azimzadeh1398">
                                    <img class="w-full h-full transition duration-200 transform group-hover:scale-110 lozad" data-src="https://roocket.ir/img/default.png" alt="user-avatar" src="https://roocket.ir/img/default.png" data-loaded="true">
                                    <div class="absolute top-0 right-0 z-0 w-full h-full bg-biscay-700 bg-opacity-20"></div>
                                </a>
                            </div>
                        </div>

                        <div class="flex flex-col mt-3 sm:mr-4 sm:mt-0">
                            <a href="/@azimzadeh1398" class="mb-2 text-3xl font-semibold text-gray-800 transition duration-200 dark:text-white hover:text-blue-700">عظیم زاده</a>
                            <div class="flex flex-col items-center text-lg text-gray-300 sm:flex-row">
                                <div><span data-time-realtime="2024-02-01 15:54:38">1 ساعت پیش</span>
                                    توسط <a href="/@azimzadeh1398" class="font-medium text-blue-500 hover:underline">عظیم زاده</a>
                                    مطرح شد</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center self-end justify-center w-full sm:self-center sm:justify-end sm:w-auto">
                        <div class="flex space-x-3 space-x-reverse">
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
            <div class="mb-6 text-center sm:text-right">
                <h1 class="mb-5 font-bold text-gray-800 dark:text-white md:text-4xl sm:text-3xl text-28 md:leading-68">
                    تبدیل عکس به کد عددی
                </h1>
                <div class="px-8 py-2 text-gray-800 bg-gray-200 rounded-lg content-area dark:bg-dark-910">
                    <p>سلام<br>
                        گاهاً دیده میشه لوگوی سایتی به جای اینکه تصویر باشه یک عدد طولانی هست که با svg شروع شده<br>
                        چگونه میشه لوگوی سایت را به چنین کدی تبدیل کرد؟<br>
                        ممنون بابت پاسگویی&zwnj;تان</p>
                </div>
            </div>
            <hr class="mb-5 border-gray-300 border-opacity-20">
            <div class="flex flex-col items-center justify-between lg:flex-row">
                <div class="flex flex-col items-center justify-center mb-5 space-y-2 sm:space-x-2 sm:space-y-0 sm:space-x-reverse lg:mb-0 sm:flex-row ">
                </div>
            </div>
        </div>
        <div>
            @foreach($topic->replays as $replay)
                <div id="{{ $replay->id }}">
                    <div class="flex items-center px-4 pb-6 bg-gray-100 shadow-lg rounded-xl pt-9">
                        <div class="w-full">
                            <div class="flex flex-col items-center justify-between mb-6 md:flex-row">
                                <div class="flex items-start self-start sm:self-center">
                                    <div>
                                        <div class="relative flex w-16 h-16 overflow-hidden bg-gray-300 border-4 border-gray-100 border-solid rounded-full group">
                                            <a href="/@saghari">
                                                <img class="w-full h-full transition duration-200 transform group-hover:scale-110 lozad" data-src="https://static.roocket.ir/images/avatar/2023/4/17/9GBsXURIUMnn5xtHD1kJgQb1XmVjJRcihdCW4kEi.png" alt="user-avatar" src="https://static.roocket.ir/images/avatar/2023/4/17/9GBsXURIUMnn5xtHD1kJgQb1XmVjJRcihdCW4kEi.png" data-loaded="true">
                                                <div class="absolute top-0 right-0 z-0 w-full h-full bg-biscay-700 bg-opacity-20"></div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="flex flex-col mr-4">
                                        <a href="/@saghari" class="mb-2 text-2xl font-semibold text-gray-800 transition duration-200 dark:text-white hover:text-blue-700">محمد حسین</a>
                                        <div class="flex flex-col items-start sm:flex-row sm:items-center">
                                            <div class="relative group dark:text-gray-920 text-gray-300 text-sm font-medium sm:pl-2 md:ml-2 md:mb-0 mb-1.5 sm:border-l border-gray-300 border-opacity-20 last:ml-0 last:pl-0 w-fit-content last:border-0 flex items-center">
                                                <span class="ml-1">تخصص :</span>
                                                <span>
                                                mevn stack
                                            </span>
                                            </div>
                                            <i class="hidden w-px h-5 mx-2 bg-gray-300 bg-opacity-20 sm:flex"></i>

                                            <a href="/@saghari" class="mt-1 text-sm font-normal text-gray-300 dark:text-gray-920 ltr hover:text-gray-450">@saghari</a>
                                            <i class="hidden w-px h-5 mx-2 bg-gray-300 bg-opacity-20 sm:flex"></i>
                                            <span class="flex items-center mt-1 text-sm font-normal text-gray-300 sm:mt-0 dark:text-gray-920">
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
                                <div class="flex items-center self-end mt-3 sm:self-center sm:mt-0">


                                    <div class="relative flex items-center justify-center w-10 h-10 ml-3 transition duration-200 bg-blue-700 border border-transparent rounded-lg cursor-pointer group dark:hover:border-white dark:bg-dark-890 dark:bg-opacity-100 bg-opacity-10 hover:bg-opacity-100">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="text-blue-700 transition duration-200 stroke-current group-hover:text-white" d="M13.8349 4.75C14.7972 3.08333 17.2028 3.08333 18.1651 4.75L26.8253 19.75C27.7876 21.4167 26.5848 23.5 24.6603 23.5H7.33974C5.41524 23.5 4.21243 21.4167 5.17468 19.75L13.8349 4.75Z" stroke="#3B82F6"></path>
                                            <path class="text-blue-700 transition duration-200 fill-current group-hover:text-white" d="M16.9072 12.7257C16.9072 13.2341 16.9022 13.6865 16.892 14.083C16.8818 14.4693 16.8666 14.8353 16.8462 15.181C16.8259 15.5165 16.8005 15.8469 16.77 16.1722C16.7497 16.4874 16.7242 16.8178 16.6937 17.1635H15.9312C15.9007 16.8178 15.8652 16.4874 15.8245 16.1722C15.794 15.8571 15.7686 15.5267 15.7482 15.181C15.7279 14.8353 15.7076 14.4693 15.6872 14.083C15.6771 13.6865 15.672 13.2341 15.672 12.7257V10.8042H16.9072V12.7257ZM16.3125 20C15.7838 20 15.5195 19.7306 15.5195 19.1917C15.5195 18.8969 15.5856 18.6885 15.7177 18.5665C15.8601 18.4343 16.0583 18.3682 16.3125 18.3682C16.5667 18.3682 16.7598 18.4343 16.892 18.5665C17.0242 18.6885 17.0902 18.8969 17.0902 19.1917C17.0902 19.7306 16.831 20 16.3125 20Z" fill="#3B82F6" fill-opacity="0.7"></path>
                                        </svg>
                                        <div class="absolute items-center justify-center hidden w-20 p-2 bg-blue-700 rounded-md group-hover:visible group-hover:flex h-9 -top-14">
                                        <span class="text-xs font-normal text-white">
                                            گزارش تخلف
                                        </span>
                                            <div class="absolute transform border-blue-700 -bottom-2 right-1/2 translate-x-2/4 c-triangle-down"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="flex">
                                <div class="flex flex-col items-center">
                                    <div>
                                        <div class="flex flex-col items-center p-3 pt-5 pr-0 space-y-2 text-xl">
                                            <div onclick="AddLike({{ $replay->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="text-gray-300 cursor-pointer w-7 h-7 hover:text-blue-700 ">
                                                    <path fill="currentColor" d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z" class=""></path>
                                                </svg>
                                            </div>
                                            <div class="text-xl font-semibold text-gray-500 ltr ">0</div>
                                            <div onclick="AddDisLike({{ $replay->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="text-gray-300 cursor-pointer w-7 h-7 hover:text-blue-700 ">
                                                    <path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z" class=""></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex items-start">
                                        <div class="w-full text-gray-800 content-area reply_item">
                                            <p>این تگ svg هست که اگه html بلد باشی باهاش آشنایی داری<br>
                                                معمولا خودشون نمیسازن و کانورت میکنن<br>
                                                گوگل کن png to svg میتونی آنلاین انجام بدی اینکارو </p>
                                        </div>
                                    </div>
                                    <hr class="mt-8 mb-5 border-gray-210 border-opacity-20">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center flex-wrap -mb-2 !space-x-reverse sm:space-x-2 space-x-0 w-full">
                                            <a href="#send-answer" class="flex items-center justify-center w-full h-10 p-4 mb-2 text-blue-700 transition duration-200 bg-blue-700 rounded-md sm:mb-0 last:ml-0 dark:text-blue-450 dark:hover:text-white bg-opacity-10 dark:bg-dark-890 hover:text-white hover:bg-opacity-100 sm:w-fit-content">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="currentColor" opacity="0.4" d="M12.02 2C6.21 2 2 6.74 2 12C2 13.68 2.49 15.41 3.35 16.99C3.51 17.25 3.53 17.58 3.42 17.89L2.75 20.13C2.6 20.67 3.06 21.07 3.57 20.91L5.59 20.31C6.14 20.13 6.57 20.36 7.081 20.67C8.541 21.53 10.36 21.97 12 21.97C16.96 21.97 22 18.14 22 11.97C22 6.65 17.7 2 12.02 2Z"></path>
                                                    <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M11.9802 13.2901C11.2702 13.2801 10.7002 12.7101 10.7002 12.0001C10.7002 11.3001 11.2802 10.7201 11.9802 10.7301C12.6902 10.7301 13.2602 11.3001 13.2602 12.0101C13.2602 12.7101 12.6902 13.2901 11.9802 13.2901ZM7.36984 13.2901C6.66984 13.2901 6.08984 12.7101 6.08984 12.0101C6.08984 11.3001 6.65984 10.7301 7.36984 10.7301C8.07984 10.7301 8.64984 11.3001 8.64984 12.0101C8.64984 12.7101 8.07984 13.2801 7.36984 13.2901ZM15.31 12.0101C15.31 12.7101 15.88 13.2901 16.59 13.2901C17.3 13.2901 17.87 12.7101 17.87 12.0101C17.87 11.3001 17.3 10.7301 16.59 10.7301C15.88 10.7301 15.31 11.3001 15.31 12.0101Z"></path>
                                                </svg>
                                                <span class="mr-1 text-sm font-medium">ارسال پاسخ</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    const token = "{{ csrf_token() }}";
    
    const AddLike = (replayID) => {
        const requestBody = {
            "replayID": replayID,
            "_token": token
        }
        fetch("{{ route('topics.addreplaylike.submit') }}", {
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': "application/json,charset-utf8"
            },
            body: JSON.stringify(requestBody)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data)
        })
        .catch(err => console.log(err));
    };

    function AddDisLike(replayID) { //TODO Complete it

    }
</script>
</body>
</html>

