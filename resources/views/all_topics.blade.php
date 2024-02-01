<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

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
        <div class=" flex flex-wrap justify-between my-3">
            <div class="flex items-center">
                <img alt="topic-logo" src="{{ asset('images/topic_icon.png') }}">
                <h1 class="text-4xl">پرسش و پاسخ</h1>
            </div>
            <div class="flex items-center justify-between">
                <select id="countries" class="mx-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                    <option value="all" selected>همه</option>
                    <option value="US">محبوبترین</option>
                    <option value="CA">جدیدترین</option>
                </select>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                    <option value="all" selected>همه</option>
                    <option value="US">محبوبترین</option>
                    <option value="CA">جدیدترین</option>
                </select>
            </div>
        </div>
        <div class="flex">
            <div class="lg:basis-3/12">
                <div class="p-3 rounded-lg border border-2 border-gray-200">
                    <h6 class="text-center text-lg">
                        دسته بندی سوالات
                    </h6>
                    <hr class="my-4">
                    @foreach($categories as $category)
                        <div class="flex items-center my-2 me-4">
                            <input id="purple-checkbox" type="checkbox" value="{{ $category->id }}" class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="purple-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->title }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="lg:basis-9/12 ps-12">
                <div class="grid grid-cols-12 xl:gap-4 gap-y-6 mb-6">
                    <div class="xl:col-span-8 col-span-12">
                        <div class="relative">
                            <input type="text" placeholder="جست و جو در عناوین ..." class="px-16 bg-gray-100 focus:ring-purple-500 focus:border-purple-500 w-full h-16 pr-20 dark:bg-dark-930 rounded-xl border-none">
                            <div class="p-3 rounded-md dark:text-white bg-gray-200 text-biscay-700 absolute top-1/2 transform -translate-y-1/2 right-5">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="7.24756" cy="7.24768" r="6.24756" stroke="currentColor" stroke-width="1.97944" stroke-linecap="round" stroke-linejoin="round"></circle>
                                    <path d="M11.5938 11.9176L14.0431 14.3606" stroke="currentColor" stroke-width="1.97944" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-4 col-span-12">
                        <a href="{{ route('topics.show.form') }}" class="h-16 bg-purple-700 dark:bg-transparent dark:hover:border-purple-450 dark:hover:text-purple-450 dark:border-gray-920 dark:border-1 flex justify-center items-center font-medium text-xl rounded-xl group text-white border-2 border-purple-700 hover:bg-white hover:text-purple-700 transition duration-200 hover:shadow-lg">
                            ثبت پرسش جدید
                            <svg class="mr-2" width="39" height="39" viewBox="0 0 42 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="stroke-current text-white transition duration-200 dark:group-hover:text-purple-450 group-hover:text-purple-700" d="M16.293 20.7224H21.0723M25.8517 20.7224H21.0723M21.0723 20.7224V15.943V25.5017" stroke-width="2.53025" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path class="stroke-current text-white transition duration-200 dark:group-hover:text-purple-450 group-hover:text-purple-700" opacity="0.5" d="M7.9995 20.7225C7.9995 23.6454 8.15777 25.908 8.54928 27.6696C8.93759 29.4168 9.53832 30.5928 10.3702 31.4247C11.2021 32.2566 12.3781 32.8573 14.1253 33.2456C15.887 33.6372 18.1495 33.7954 21.0725 33.7954C23.9954 33.7954 26.2579 33.6372 28.0196 33.2456C29.7668 32.8573 30.9428 32.2566 31.7747 31.4247C32.6066 30.5928 33.2073 29.4168 33.5956 27.6696C33.9871 25.908 34.1454 23.6454 34.1454 20.7225C34.1454 17.7995 33.9871 15.537 33.5956 13.7754C33.2073 12.0281 32.6066 10.8521 31.7747 10.0202C30.9428 9.18833 29.7668 8.58759 28.0196 8.19928C26.2579 7.80778 23.9954 7.64951 21.0725 7.64951C18.1495 7.64951 15.887 7.80778 14.1253 8.19928C12.3781 8.58759 11.2021 9.18833 10.3702 10.0202C9.53832 10.8521 8.93759 12.0281 8.54928 13.7754C8.15777 15.537 7.9995 17.7995 7.9995 20.7225Z" stroke-width="2.53025" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mb-5 flex flex-col bg-gray-100 shadow-lg rounded-xl sm:px-11 px-3 pt-8 pb-7">
                    <div class="flex items-center justify-between lg:flex-nowrap flex-wrap mb-6">
                        <div class="flex sm:items-start items-center sm:flex-row flex-col sm:text-right text-center lg:w-auto w-full">
                            <div class="relative ">
                                <div class="w-16 h-16 flex bg-gray-300 group relative rounded-full overflow-hidden border-4 border-solid border-gray-100">
                                    <a href="/@Zsoltanpour">
                                        <img class="transition duration-200 transform group-hover:scale-110 w-full h-full lozad" data-src="https://roocket.ir/img/default.png" alt="user-avatar" src="https://roocket.ir/img/default.png" data-loaded="true">
                                        <div class="w-full h-full absolute top-0 right-0 bg-biscay-700 bg-opacity-20 z-0"></div>
                                    </a>
                                </div>
                            </div>

                            <div class="flex flex-col sm:mt-0 mt-3 sm:mr-3">
                                <a href="/@Zsoltanpour" class="text-gray-800 font-bold dark:text-white dark:hover:text-blue-450 hover:text-blue-700 transition duration-200 text-2xl mb-2">زهرا سلطانپور </a>
                                <div class="text-gray-600 dark:text-gray-920 font-normal text-sm flex items-center">
                                    <div class="text-blue-500 dark:text-blue-450 font-medium ml-1" data-time-realtime="2024-01-31 17:13:23">4 ساعت پیش</div>
                                    <div> توسط <a href="/@salar.mohammad2013" class="text-blue-500 dark:text-blue-450 font-medium hover:underline">محمد رضا</a> آپدیت شد</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex sm:items-center items-end lg:w-auto sm:mt-0 mt-3 sm:mx-0 w-fit-content   justify-end">
                            <div class="flex items-center last:ml-0 sm:my-0  space-x-3 space-x-reverse">
                                <div class="flex space-x-reverse space-x-3">
                                </div>
                            </div>
                            <div class="flex items-center">
                                <a href="/discuss/نحوه-ی-ارسال-ارایه-در-فرم" class="flex items-center px-5 py-1.5 rounded-lg bg-white mr-3 border border-opacity-0 border-white text-gray-450 group font-normal text-lg justify-center transition duration-200 hover:text-gray-50 hover:bg-gray-700">
                                    <svg class="ml-2" width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="currentColor" d="M8.12134 11.7807L4.13281 7.7599L8.12134 3.73914" stroke-width="1.48905" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path stroke="currentColor" d="M16.8961 16.6058V10.9767C16.8961 10.1236 16.5599 9.30549 15.9615 8.70226C15.3631 8.09902 14.5515 7.76013 13.7053 7.76013H4.13281" stroke-width="1.48905" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    4 پاسخ
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-7 sm:text-right text-center">
                        <h3 class="text-start transition duration-200 mb-3 font-bold md:text-33 sm:text-26 text-22 w-fit-content">
                            <a href="/discuss/نحوه-ی-ارسال-ارایه-در-فرم" class="text-start text-xl font-bold leading-relaxed text-gray-800 dark:text-white hover:text-blue-700 ">
                                نحوه ی ارسال ارایه در فرم
                            </a>
                        </h3>
                        <p class="font-normal sm:text-lg text-base !leading-loose text-gray-360 dark:text-gray-920  overflow-x-auto">سلام وقتتون بخیر
                            کسی میتونه کمکم کنه بگه چه طور میتونم یک ارایه رو به کمک فرم ارسال کنم
                            &amp;lt;input type="hidden" name="priceReng" id="priceRang" value=""&amp;gt;
                            این کد رو با متد post میزنم این ارور رو میده
                            htmlspecialchars(): Argument #1 ($string) must be of type string, array given
                            میدونم...</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
</body>
</html>

