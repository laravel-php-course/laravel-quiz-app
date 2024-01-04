<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">
<div class=" flex justify-center h-screen">
<form action="" method="post" class="bg-white p-8 rounded m-auto">
    <div class="block flex">
    <label class=" text-gray-500 font-bold mt-4 px-4"  >نام</label>
    <input class="input" type="text" name="name" placeholder="نام را وارد کنید ...">
</div><div class="block flex"  id="email">
    <label class=" text-gray-500 font-bold mt-4 px-4" >ایمیل</label>
    <input class=" input " type="email" name="email" placeholder="ایمیل را وارد کنید ...">
</div><div class="block flex"  id="phone">
    <label class=" text-gray-500 font-bold mt-4 px-4" >تلفن</label>
    <input class=" input" type="phone" name="phone" placeholder="تلفن را وارد کنید ...">
</div>
<a href="" class=" block mr-4 text-gray-400 my-2 text-sm ">حساب ندارم / ثبت نام</a>
    <input class="btn" type="submit" name="submit" value="ثبت">
</form>
</div>
</body>
</html>