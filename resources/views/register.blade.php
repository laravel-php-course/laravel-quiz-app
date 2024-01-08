<!doctype html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100">
    <div class="flex justify-center h-screen ">
        <form action="{{ route('user.auth.register') }}" method="post" class="p-8 m-auto bg-white rounded">
            @csrf
            <h1 class="text-2xl text-center">ثبت نام</h1>
            <div class="flex">
                <label class="px-4 mt-4 font-bold text-gray-500 ">نام</label>
                <input class="input" type="text" name="name" placeholder="نام را وارد کنید ...">
            </div>
            <div class="flex">
                <label class="px-4 font-bold text-gray-500 ">ایمیل</label>
                <input {{ old('type') == 'mobile' ? '' : 'checked' }} class="" type="radio" value="email" name="type" id="email">
                <label class="px-4 font-bold text-gray-500 ">موبایل</label>
                <input {{ old('type') == 'mobile' ? 'checked' : '' }} class="" type="radio" value="mobile" name="type" id="mobile">
                @error('type')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="{{ old('type') == 'mobile' ? 'hidden' : 'flex' }}" id="email-container">
                <label class="px-4 mt-4 font-bold text-gray-500 ">ایمیل</label>
                <input class=" input" type="text" name="email" placeholder="ایمیل را وارد کنید ...">
                @error('email')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="{{ old('type') == 'mobile' ? 'flex' : 'hidden' }}" id="mobile-container">
                <label class="px-4 mt-4 font-bold text-gray-500 ">موبایل</label>
                <input class=" input" type="text" name="mobile" placeholder="موبایل را وارد کنید ...">
                @error('mobile')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="/logIn" class="block my-2 mr-4 text-sm text-gray-400 ">حساب ندارم / ثبت نام</a>
            <input class="btn" type="submit" name="submit" value="ثبت"> //TODO Add loader and disable btn
        </form>
    </div>
</body>

</html>
<script>
    const emailInput = document.getElementById('email');
    const mobileInput = document.getElementById('mobile');

    emailInput.addEventListener('click', (event) => {
        document.querySelector('#email-container').classList.add('flex');
        document.querySelector('#email-container').classList.remove('hidden');

        document.querySelector('#mobile-container').classList.add('hidden');
        document.querySelector('#mobile-container').classList.remove('flex');
    });
    mobileInput.addEventListener('click', (event) => {
        document.querySelector('#mobile-container').classList.add('flex');
        document.querySelector('#mobile-container').classList.remove('hidden');

        document.querySelector('#email-container').classList.add('hidden');
        document.querySelector('#email-container').classList.remove('flex');
    });

</script>
