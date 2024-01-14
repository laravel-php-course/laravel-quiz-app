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
        <div class="bg-white overflow-hidden shadow rounded-lg border">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    فرزاد فروزانفر
                </h3>

            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            فرزاد فروزانفر
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            farzad@gmail.com
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Phone number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            09151234567
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            کد ملی
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
         0671232223
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            مهارت
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            طراحی وب , پی اچ پی و لاراول
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            سوالات طرح شده
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="#" class="hover:text-blue-600">نمونه سوالات لاراول </a><br>
                            <a href="#" class="hover:text-blue-600">نمونه سوالات لاراول </a><br>
                            <a href="#" class="hover:text-blue-600">نمونه سوالات لاراول </a><br>
                            <a href="#" class="hover:text-blue-600">نمونه سوالات لاراول </a><br>
                            <a href="#" class="hover:text-blue-600">نمونه سوالات لاراول </a><br>

                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>
@endsection
