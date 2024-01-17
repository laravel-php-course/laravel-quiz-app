@extends('admin.template')

@section('title')
    پیشخوان
@endsection
<link rel="stylesheet" href="{{ asset('css/multi_select.css') }}" />
<script src="{{ asset('js/multi_select.js') }}"></script>
<link type="text/css" rel="stylesheet" href="{{ url('datePicker/jalalidatepicker.min.css') }}" />
<script type="text/javascript" src="{{ url('datePicker/jalalidatepicker.min.js') }}"></script>
@section('content')
    <section class="p-4">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نام
                    </th>
                    <th scope="col" class="px-6 py-3">
                        وضعیت
                    </th>
                    <th scope="col" class="px-6 py-3">
                        عملیات
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="{{asset('/images/profile-picture-1.jpg')}}" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold"><a href="{{route('admin.one.teacher.show', ['id' => $teacher->id])}}" class="hover:text-blue-600">{{ $teacher->name }}</a></div>
                                <div class="font-normal text-gray-500">{{ $teacher->email }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <div id="status-container-{{ $teacher->id }}" class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full me-1 {{ \App\Models\Teacher::getStatusIcon($teacher->status) }}">
                                </div>
                                <span>
                                    {{ \App\Models\Teacher::getPersianStatus($teacher->status) }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <button data-modal-target="popup-modal-{{$teacher->id}}" data-modal-toggle="popup-modal-{{$teacher->id}}" type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">اصلاح</button>

                        </td>
                    </tr>

                    <div id="popup-modal-{{$teacher->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{$teacher->id}}">
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
                                    <button onclick="changeStatus({{$teacher->id}}, '{{ \App\Models\Teacher::ACTIVE }}')" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                        تایید کردن
                                    </button>
                                    <button onclick="changeStatus({{$teacher->id}}, '{{ \App\Models\Teacher::PENDING }}')" type="button" class="text-white bg-yellow-600 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                        درانتظار تایید
                                    </button>
                                    <button onclick="changeStatus({{$teacher->id}}, '{{ \App\Models\Teacher::SUSPEND }}')" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
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

    </section>
    <script>
        const changeStatus = (id, action) => {
            $.ajax({
                type:'post',
                data: {
                    id: id,
                    action:action,
                    _token: "{{ csrf_token() }}"
                },
                url: '{{ route('admin.change.status.teacher') }}',
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
