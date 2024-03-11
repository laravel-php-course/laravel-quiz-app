<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
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
