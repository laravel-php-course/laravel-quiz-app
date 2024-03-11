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

<form class="max-w-sm mx-auto block" action="{{ route('admin.auth.login') }}" method="post">
    @csrf


    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <li class="inline-block p-4 border-b-2 text-blue-600 active border-blue-600  rounded-t-lg   " id="email_input">
                <label for="email_input">ایمیل</label>
                <input href="#" id="email_radio" checked type="radio"  value="email" name="type" >
            </li>
            <li class="inline-block p-4 border-b-2 "  for="phone_input " id="phone_input">
                <label for="phone_input ">تلفن</label>
                <input href="#" id="phone_radio" type="radio" value="mobile" name="type" >
            </li>

        </ul>
    </div>

    <div class="my-4 " id="email">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                </svg>
            </div>
            <input type="text" id="email-input" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="kourosh@gmail.com"  />

        </div>                @error('type')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="my-4 hidden" id="phone">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                </svg>
            </div>
            <input type="text" id="phone-input" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0915123456"  />

        </div>                @error('type')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
    </div>

    <input type="submit" name="submit" value="ثبت"  class="text-white w-full submit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">

</form>


</body>
<script>
    let email_input = document.getElementById('email_input')
    let phone_input = document.getElementById('phone_input')
    let email = document.getElementById('email')
    let phone = document.getElementById('phone')
    email_input.addEventListener('click' , function() {
        email.classList.remove('hidden');
        phone.classList.add('hidden');
        document.getElementById('email_radio').checked = true

        email_input.classList.add("text-blue-600" ,"border-blue-600" )
        phone_input.classList.remove("text-blue-600" ,"border-blue-600" )
    });
    phone_input.addEventListener('click' , function() {
        email.classList.add('hidden');
        phone.classList.remove('hidden');
        document.getElementById('phone_radio').checked = true

        phone_input.classList.add("text-blue-600" ,"border-blue-600" )
        email_input.classList.remove("text-blue-600" ,"border-blue-600" )
    })
</script>
</html>
