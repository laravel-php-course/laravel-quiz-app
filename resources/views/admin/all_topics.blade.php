@extends('admin.template')


@section('topic')
    bg-gray-200
@endsection


@section('content')


    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-gray-900 dark:bg-gray-900 p-4">
        <div class="flex items-center m-2 ">
            <a class="text-white m-2 p-2 bg-purple-500 rounded-lg" href="/admin/topics/show/type/all">همه</a>
            <a class="text-white m-2 p-2 bg-purple-500 rounded-lg" href="/admin/topics/show/type/UnAccept">در انتظار</a>
            <a class="text-white m-2 p-2 bg-purple-500 rounded-lg" href="/admin/topics/show/type/Suspend">رد شده</a>

        </div>
        <label class="text-white">جستوجو :</label>
        <input type="text" id="table-search-users" class="rounded-lg ml-auto m-2 px-3" placeholder="چی رو میخوای ؟">

        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-8000 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:text-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">فیلتر</span>
                فیلتر
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700  dark:bg-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-900">پذیرفته شده ها</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-900">رد شده ها</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-gray-900">در انتظار تایید ها</a>
                    </li>
                </ul>

            </div>
        </div>

    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4 text-gray-900">

        <table class="w-full text-sm text-left rtl:text-right text-gray-8000 dark:text-gray-400 ">
            <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    عنوان
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    متن
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    دسته بندی
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    سازنده
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    وضعیت
                </th>
                <th scope="col" class="px-6 py-3 text-xs md:text-md">
                    عملیات
                </th>
            </tr>

            </thead>
            <tbody>
            @foreach($topics as $topic)
            <tr class="bg-gray-100 border-b dark:text-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">

                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-gray-900">

                    <div class="text-base font-semibold text-xs md:text-md">{{$topic->title}}</div>

                </th>
                <td class="px-6 py-4 text-gray-900 text-xs md:text-md">
                    {{$topic->body}}
                </td>
                <td class="px-6 py-4 text-gray-900 text-xs md:text-md">
                    {{$topic->category->title}}
                </td>
                <td class="px-6 py-4 text-gray-900 text-xs md:text-md">
                    {{$topic->users->name}}
                </td>
                <td class="px-6 py-4">
                    <div id="status-container-{{ $topic->id }}" class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full me-1 {{ \App\Models\Topic::getStatusIcon($topic->status) }}">
                        </div>
                        <span>
                                    {{ \App\Models\Topic::getPersianStatus($topic->status) }}
                                </span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <button data-modal-target="popup-modal-{{$topic->id}}" data-modal-toggle="popup-modal-1" type="button" class="font-medium text-blue-600 dark:text-blue-800 hover:underline text-xs md:text-md">ویرایش</button>

                </td>
            </tr>
            <div id="popup-modal-{{$topic->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-1">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">عملیات خود را انتخاب کنید     </h3>
                            <button onclick="changeStatus({{$topic->id}}, '{{ \App\Models\Topic::ACTIVE }}')"  type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                تایید کردن
                            </button>
                            <button onclick="changeStatus({{$topic->id}}, '{{ \App\Models\Topic::PENDING }}')"  type="button" class="text-white bg-yellow-600 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                درانتظار تایید
                            </button>
                            <button onclick="changeStatus({{$topic->id}}, '{{ \App\Models\Topic::SUSPEND }}')"  type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                رد کردن
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach


            </tbody>
        </table>
    </div>

    </div>


    <script>
        const changeStatus = (id, action) => {
            $.ajax({
                type:'post',
                data: {
                    id: id,
                    action:action,
                    _token: "{{ csrf_token() }}"
                },
                url: '{{ route('admin.change.status.topic') }}',
                success: (response) => {
                    const classList = document.querySelector(`#status-container-${id} div`).classList;

                    $(`#status-container-${id} div`).removeClass(classList[classList.length - 1]).addClass(response.icon);
                    $(`#status-container-${id} span`).text(response.title);
                },
                error: (xhr, status, code) => {
                    console.log(xhr);
                }
            });
        }

    </script>

@endsection
