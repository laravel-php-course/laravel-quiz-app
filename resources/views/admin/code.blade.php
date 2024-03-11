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
<body class="h-screen flex items-center justify-center">
<div class="max-w-sm mx-auto block">
    <form  action="{{ route('admin.auth.verification.code') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $destination }}" name="destination">
        <div class="flex mb-2 space-x-2 rtl:space-x-reverse">
            <div>

                <input type="text" maxlength="1" id="code_1" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-purple-400 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
            </div>
            <div>
                <input type="text" maxlength="1" id="code_2"  class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-purple-400 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
            </div>
            <div>
                <input type="text" maxlength="1" id="code_3" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-purple-400 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
            </div>
            <div>
                <input type="text" maxlength="1" id="code_4" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-purple-400 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
            </div>
            <div>
                <input type="text" maxlength="1" id="code_5" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-purple-400 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
            </div>
            <div>
                <input type="text" maxlength="1" id="code_6"  class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-purple-400 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
            </div>
            <div>
                <input type="text" maxlength="1" id="code_7"  class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-purple-400 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
            </div>
        </div>

        <p  class="mt-2 text-sm text-gray-500 dark:text-gray-400  border-purple-500 text-purple-500 pb-2 ">زمان باقی مانده : <span class="text-purple-700 font-bold"  id="timer">1:54</span></p>
        <p  class="mt-2 text-sm text-gray-500 dark:text-gray-400 border-t-2 border-purple-500 text-purple-500 pt-2">لطفا کدی که به ایمیلت ارسال شده رو وارد کن <span class="text-purple-700 font-bold">:)</span></p>

        <input type="hidden" name="Code" id="hidden">
        <input type="submit" name="submit" value="تایید" id="submit" class="p-2 bg-purple-500 border-b-4 mt-2 border-purple-700 rounded-lg text-white w-full">
    </form>
    <form action="{{ route('admin.auth.resend.code') }}" method="post">
        @csrf
        <input class="mt-2 hidden inline-block text-sm text-purple-700 border-x-2 px-2 mr-auto border-purple-500 dark:text-gray-400  border-purple-500 text-purple-500" id="resend" type="submit" name="submit" value="ارسال دوباره کد">
        <input type="hidden" value="{{ $destination }}" name="destination">

    </form>

</div>
</body>
<script>
    let code_1 = document.getElementById('code_1')
    let code_2 = document.getElementById('code_2')
    let code_3 = document.getElementById('code_3')
    let code_4 = document.getElementById('code_4')
    let code_5 = document.getElementById('code_5')
    let code_6 = document.getElementById('code_6')
    let code_7 = document.getElementById('code_7')
    let submit = document.getElementById('submit')
    let hidden = document.getElementById('hidden')
    submit.addEventListener('click' , function () {
        hidden.value = code_7.value+code_6.value+code_5.value+code_4.value+code_3.value+code_2.value+code_1.value
    })

    function countdown(seconds) {
        let display = document.getElementById('timer');

        let interval = setInterval(function() {
            if (seconds > 0) {
                display.textContent =seconds + ' ثانیه';
                seconds--;
            } else {
                display.textContent = "زمان به پایان رسید!";

                document.getElementById('resend').classList.remove('hidden');
                clearInterval(interval);
            }
        }, 1000);
    }
    countdown(120);
</script>
</html>
