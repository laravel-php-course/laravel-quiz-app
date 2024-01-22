@extends('admin.template')

@section('title')
    پیشخوان
@endsection

@section('content')
    <section class="p-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        عنوان
                    </th>
                    <th scope="col" class="px-6 py-3">
                        دسته بندی
                    </th>
                    <th scope="col" class="px-6 py-3">
                        تعداد سوالات
                    </th>
                    <th scope="col" class="px-6 py-3">
                        لسیت سوالات
                    </th>
                    <th scope="col" class="px-6 py-3">
                        تاریخ ایجاد
                    </th>
                    <th scope="col" class="px-6 py-3">
                        آخرین ویرایش
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                    {{ ($quizzes->currentPage() - 1) * $quizzes->perPage() + $loop->index + 1 }}
                            </div>
                        </td>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center">
                                {{ $quiz->title }}
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                {{ $quiz->category->title }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                {{ $quiz->total_questions }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <a href="#">
                                    Link
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                {{ $quiz->created_at }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                {{ $quiz->updated_at }}
                            </div>
                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>
            {{ $quizzes->links() }}
        </div>

    </section>
@endsection
{{
    //TODO Search About Pagination Laravel How Customize UI
    //TODO ADD Button for delete and Update Quiz
    //TODO Implement UI For Questions Link At Line 62
    //TODO Create Quiz UI for users
    //TODO ADD migaration For تالار گفتمان : Topics, comments, likes , ....
}}
