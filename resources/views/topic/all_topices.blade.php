<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="p-3 bg-gray-50">
<div id="body">
<div class="grid grid-cols-8 gap-4 border bg-white">
    <div class="md:col-span-1 col-span-4"><img class="rounded-xl p-2" src="{{asset('/images/lPic_1e3921d45deea40535cfd8ddb274b02b.webp')}}"></div>
    <div class="md:col-span-7 col-span-4">
        <h2 class="text-xl p-3">چطور توی پی اچ پی چاپ کنم؟</h2>
        <span class="bg-gray-100 text-gray-800 m-3 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">وب</span>
    <p class="p-3 pt-7 text-gray-700 text-sm">ببخشید من یکم مبتدی ام ولی ممنون میشم ...</p>
        <div class="flex flex-wrap">
            <span class="p-3 text-gray-400 pl-7">جواد جوادی</span>
            <span class="p-3 text-gray-400 pl-7">پاسخ ها: 4</span>
            <span class="p-3 text-gray-400 pl-7">بروزرسانی شده در : 10 دقیقه قبل</span>
        </div>
    </div>
</div>
<button class="bg-blue-500 rounded-full p-5 absolute left-5 bottom-5" onclick="addTopic()">افزودن تاپیک</button>
</div>
<div id="topicForm" class="hidden p-5 bg-white w-80 absolute left-0 right-0 ml-auto mr-auto top-0 bottom-0 mt-auto mb-auto h-fit shadow-2xl">
    <label for="title" class="text-xl">عنوان :</label>
    <input type="text" class="w-full border p-4 mt-4" name="" id="title" placeholder="عنوان شما ...">
    <div class="relative mt-4 flex flex-wrap items-stretch mb-4">
        <label class="flex items-center whitespace-nowrap rounded-r border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200" for="inputGroupSelect01">دسته بندی :</label>
        <select class="form-select relative m-0 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:bg-neutral-800 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" id="inputGroupSelect01">
            <option value="1">وب</option>
            <option value="2">موبایل</option>
            <option value="3">دیتابیس</option>
        </select>
    </div>
    <label class="text-xl">متن :</label>
      <textarea class="focus:border-blue-600 w-full border p-4 mt-4" placeholder="سوال شما ..."></textarea>
<button class="bg-blue-500 p-2 rounded" type="submit">تایید</button>
    <button class="bg-red-500 p-2 rounded" onclick="removeTopic()">بیخیال</button>
</div>
</body>
<script>
    function addTopic() {
        document.getElementById('topicForm').classList.remove('hidden');
        document.getElementById('body').classList.add('blur');
    }
    function removeTopic() {
        document.getElementById('topicForm').classList.add('hidden');
        document.getElementById('body').classList.remove('blur');
    }
</script>
</html>

