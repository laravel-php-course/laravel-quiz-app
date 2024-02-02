<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
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
            <a href="#responsive-header" class="block mt-4 md:inline-block md:mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
               آزمون ها
            </a>
            <a href="#responsive-header" class="block mt-4 md:inline-block md:mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                سوالات
            </a>
            <a href="#responsive-header" class="block mt-4 md:inline-block md:mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
                دبیران
            </a>
            <a href="{{ route('topics.all.form') }}" class="block mt-4 md:inline-block md:mt-0 text-purple-500 hover:bg-purple-500 p-3 font-bold hover:text-white mr-4">
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
<section class="flex flex-row flex-wrap w-full">
    @foreach($quizzes as $quiz)
        <a href="{{ route('quiz.ShowExam', ['quiz' => $quiz->id]) }}" class="lg:w-1/4 md:w-1/2  w-full p-3">
            <div class="w-full rounded-3 border border-gray-200">
                <div class="card-header flex justify-center">
                    <img src="data:image/jpeg;base64,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" alt="" class="">
                </div>
                <div class="card-body flex justify-center">
                    {{ $quiz->title }}
                </div>
                <div class="card-footer flex justify-between">
                <span>
                    دسته بندی : {{ $quiz->category->title }}
                </span>
                    <span>
                    زمان آزمون : {{ $quiz->quiz_time }} دقیقه
                </span>
                </div>
            </div>
        </a>
    @endforeach
</section>
</body>
</html>

