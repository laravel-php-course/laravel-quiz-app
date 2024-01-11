<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">
<div class=" flex justify-center h-screen">
    <form action="{{ $action }}" method="post" class="bg-white p-8 rounded m-auto">
        @csrf
        <input type="hidden" value="{{ $destination }}" name="destination">
        <div class="block flex">
            <label class=" text-gray-500 font-bold mt-4 px-4"  id="timer"></label>
            <input class="input" type="text" name="Code" placeholder="کد را وارد کنید ...">
        </div>

        <input class="btn" type="submit" name="submit" value="ثبت">
    </form>
    <form action="{{$resend}}" method="post">
        @csrf
        <input class="block mr-4 text-gray-400 my-2 text-sm hidden" id="resend" type="submit" name="submit" value="ارسال دوباره کد">
        <input type="hidden" value="{{ $destination }}" name="destination">

    </form>
</div>
</body><script>
    function countdown(seconds) {
        let display = document.getElementById('timer');

        let interval = setInterval(function() {
            if (seconds > 0) {
                display.textContent = 'زمان باقی‌مانده: ' + seconds + ' ثانیه';
                seconds--;
            } else {
                display.textContent = "زمان به پایان رسید!";
                document.getElementById('resend').textContent = "ارسال دوباره کد";
                document.getElementById('resend').classList.remove('hidden');
                clearInterval(interval);
            }
        }, 1000);
    }
    countdown(120);
</script>

</html>
