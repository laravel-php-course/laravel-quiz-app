@extends('admin.template')

@section('title')
    پیشخوان
@endsection

@section('content')
    <section class="p-4">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4 w-full">
            <div class="bg-white flex justify-between p-4 rounded-lg shadow-md items-center">
                <span class="flex items-center bg-green-500 rounded-lg py-4 px-5 text-white text-xl text-center ml-3">
                    <i class="fa-solid fa-film"></i>
                </span>
                <p>سینماها : {{ '12' }}</p>
            </div>
            <div class="bg-white flex justify-between p-4 rounded-lg shadow-md items-center">
                <span class="flex items-center bg-rose-500 rounded-lg py-4 px-5 text-white text-xl text-center ml-3">
                    <i class="fa-solid fa-video"></i>
                </span>
                <p>فیلم ها : {{ '12' }}</p>
            </div>
            <div class="bg-white flex justify-between p-4 rounded-lg shadow-md items-center">
                <span class="flex items-center bg-purple-500 rounded-lg py-4 px-5 text-white text-xl text-center ml-3">
                    <i class="fas fa-users-rectangle"></i>
                </span>
                <p>بازیگران : {{ '12' }}</p>
            </div>
            <div class="bg-white flex justify-between p-4 rounded-lg shadow-md items-center">
                <span class="flex items-center bg-amber-400 rounded-lg py-4 px-5 text-white text-xl text-center ml-3">
                    <i class="fa-solid fa-comments"></i>
                </span>
                <p>نظرات : {{ '12' }}</p>
            </div>
        </div>

        <header class="mt-6">
            <h1 class="bg-blue-400 px-4 py-3 rounded-t-lg text-xl text-gray-50">
                گزارش فروش پیشرفته
            </h1>
        </header>
        <main class="w-full py-5 px-3 grid grid-cols-3 gap-2 bg-gray-50">

        </main>
        <footer class="bg-gray-50 pb-4 flex justify-center">
            <button id="submit-search" class="px-8 py-2 bg-blue-500 hover:bg-blue-600 rounded-lg text-white">جستجو</button>
        </footer>

        <div class="relative overflow-x-auto shadow-md rounded-b-lg">
            <div id="totalPriceContainer" style="display:none" class="text-lg text-gray-700 bg-gray-50">
                مجموع : <span id="totalPrice"></span> تومان
            </div>
            <table style="display: none" id="result" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs border border-1 border-gray-100 text-gray-700 uppercase bg-blue-50">
                    <tr>
                        <th scope="col" class="text-center px-6 py-3">
                            کاربر
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            فیلم
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            سینما
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            سالن
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            مبلغ
                        </th>
                        <th scope="col" class="text-center px-6 py-3">
                            تاریخ پرداخت
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
            <div style="display: none" class="text-center bg-yellow-100 text-yellow-600 py-4 text-lg" id="msg">نتیجه ای یافت نشد</div>
        </div>

    </section>
@endsection
