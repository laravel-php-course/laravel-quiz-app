<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>کوییزر</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>
<body class="h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white px-6 py-4 rounded-lg shadow-2xl border-s-4 {{ $type == 'info' ? 'border-s-cyan-500' : ($type == 'error' ? 'border-s-red-600' : 'border-s-green-600') }}">
        @if($type == 'info')
            <i class="fa-solid fa-circle-info text-cyan-500"></i>
        @elseif($type == 'error')
            <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
        @elseif($type == 'success')
            <i class="fa-solid fa-circle-check text-green-600"></i>
        @endif
        <span>
            {{ $message }}
        </span>
        @if(isset($link))
            <div class="w-100 mt-5 flex justify-center">
                <a class="{{ $type == 'info' ? 'bg-cyan-500' : ($type == 'error' ? 'bg-red-600' : 'bg-green-600') }} text-cyan-50 rounded-md p-2" href="{{ $link['url'] }}">{{ $link['title'] }}</a>
            </div>
        @endif
    </div>
</body>
</html>
