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
        @php
            $quiz_number = 1;
                 if (!empty($errors)){

                                            echo $errors ;
                                    }
                 $i = 0
        @endphp
        <form action="{{ route('topics.create.submit.form') }}" method="POST" class="">
            @csrf
            <label for="title" class="text-xl">عنوان :</label>
            <input type="text" class="w-full rounded-lg border p-4 mt-4" name="title" id="title" placeholder="عنوان شما ...">
            <div class="relative mt-4 flex flex-wrap items-stretch mb-4">
                <label class="flex items-center whitespace-nowrap rounded-r border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200" for="inputGroupSelect01">دسته بندی :</label>
                <select name="category" class="form-select relative m-0 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" id="inputGroupSelect01">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->title }} </option>
                    @endforeach
                </select>
            </div>
            <label class="text-xl">متن :</label>
            <textarea name="body" class="rounded-lg focus:border-blue-600 w-full border p-4 mt-4" placeholder="سوال شما ..."></textarea>
            <button class="bg-blue-500 p-2 rounded" type="submit">ایجاد</button>
        </form>
    </div>
</section>
</body>
</html>

