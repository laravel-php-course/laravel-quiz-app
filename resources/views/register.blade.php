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
        <h2 class="text-xl text-red-600 text-center">
@isset($codeNotCorrect)
                {{$codeNotCorrect}}
            @endisset
        </h2>
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
        <a href="{{route('user.logIn')}}" class="block my-2 mr-4 text-sm text-gray-400 ">حساب دارم / ورود</a>
        <div class="flex ">
            <div class="btn flex submitLoader">
        <input class="submit "  type="submit" name="submit" value="ثبت" id="submit">
        <svg aria-hidden="true" class="hidden loader w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg></div></div>
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
    document.querySelector('input.submit').addEventListener('click', (event) => {
        document.querySelector('.loader').classList.remove('hidden')
        document.querySelector('div.submitLoader').classList.add('bg-gray-300')

    });


</script>
