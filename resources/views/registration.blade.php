<!doctype html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>

<body class="bg-green-600 h-screen flex items-center justify-center">

<div class="flex justify-center ">

<div class="inline-flex rounded-md shadow-sm justify-center" role="group">
    <button type="button" class="px-14 py-12 text-lg font-medium text-gray-900 bg-white  rounded-2xl m-2 hover:bg-gray-100 hover:text-green-700 ">
        <a href="{{route('teacher.logIn')}}">ورود استاد</a>
    </button>
    <button type="button" class="px-14 py-12 text-lg font-medium text-gray-900 bg-white rounded-2xl m-2 hover:bg-gray-100 hover:text-green-700 f">
        <a href="{{route('user.logIn')}}">ورود دانش آموز</a>
    </button>
</div>
</div>
</body>
