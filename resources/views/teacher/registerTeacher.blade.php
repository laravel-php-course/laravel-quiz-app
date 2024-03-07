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

<form class="max-w-sm mx-auto block mt-10" action="{{ route('teacher.auth.register') }}" method="post" >
    @php
        if (!empty($errors->all())){
            foreach ($errors->all() as $error ){
                echo $error ;
            }

}
    @endphp
    <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام و نام خوانوادگی</label>
        <input type="text" id="first_name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="kourosh" required />
    </div>
    @csrf

    <div class="my-4" id="email">
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ایمیل</label>

        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                    <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                </svg>
            </div>
            <input type="text" id="email-address-icon" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@gmail.com">
        </div>
    </div>
    <div class="my-4" id="phone">
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تلفن</label>

        <div class="relative">
            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                </svg>
            </div>
            <input type="text" id="phone-input" name="mobile" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="091234567" required />
        </div>
    </div>

    <div class="my-4" id="meli">
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">کد ملی</label>

        <div class="relative">
            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                    <path d="M17.728,4.419H2.273c-0.236,0-0.429,0.193-0.429,0.429v10.304c0,0.234,0.193,0.428,0.429,0.428h15.455c0.235,0,0.429-0.193,0.429-0.428V4.849C18.156,4.613,17.963,4.419,17.728,4.419 M17.298,14.721H2.702V9.57h14.596V14.721zM17.298,8.712H2.702V7.424h14.596V8.712z M17.298,6.566H2.702V5.278h14.596V6.566z M9.142,13.005c0,0.235-0.193,0.43-0.43,0.43H4.419c-0.236,0-0.429-0.194-0.429-0.43c0-0.236,0.193-0.429,0.429-0.429h4.292C8.948,12.576,9.142,12.769,9.142,13.005"></path>      </div>
            <input type="text" name="code" id="phone-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0671256789" required />
        </div>
    </div>
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">پایه :</label>
    <select id="countries" name="grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="10">دهم</option>
        <option value="11">یازدهم</option>
        <option value="12">دوازدهم</option>
    </select>
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">درس تخصصی :</label>
    <select id="countries" name="study" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="riazi">ریاضی</option>
        <option value="physics">فیزیک</option>
        <option value="hendese">هندسه</option>
        <option value="shimi">شیمی</option>
    </select>

    <div class="text-sm font-medium text-center mt-2 text-gray-500 border-2 p-2 rounded-lg border-gray-200 ">
        <label class="mt-2">کد تایید را به ایمیل ارسال کنیم یا تلفن ؟</label>
        <ul class="flex flex-wrap -mb-px">
            <li class="inline-block p-4    rounded-t-lg   " id="email_input">
                <label for="email_input">ایمیل</label>
                <input href="#" id="email_radio" checked type="radio"  value="email" name="type" >
            </li>
            <li class="inline-block p-4 "  for="phone_input " id="phone_input">
                <label for="phone_input ">تلفن</label>
                <input href="#" id="phone_radio" type="radio" value="mobile" name="type" >
            </li>

        </ul>
    </div>
    <a href="{{route('teacher.logIn')}}" class="block my-2 mr-4 text-sm text-gray-400 ">حساب دارم / ورود</a>
    <button type="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ثبت نام</button>
</form>


</body>

</html>
