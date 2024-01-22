@extends('teacher.template')

@section('title')
    ایجاد امتحان
@endsection
{{--@php--}}
{{--if (!empty($errors->all()))--}}
{{--    dd($errors->all());--}}
{{--@endphp--}}
@section('content')
    <section class="p-4">
        <div class="px-2 py-3 bg-white rounded-md shadow-sm">
            <header>
                <h1 class="text-center text-gray-800">
                    افزودن امتحان جدید
                </h1>
            </header>
            <form action="/quiz/add" method="post">
                <div>
                    <label for="quiz_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان امتحان</label>
                    <input name="quiz_title" type="text" id="quiz_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="عنوان امتحان" required>
                </div>
                @csrf
                <div class="flex items-center w-100">
                    <div class="">
                        <label for="total-question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تعداد سوال درخواستی</label>
                        <select id="total-question" name="quize_count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">دسته بندی :</label>
                            <select id="categories" name="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="1">وب</option>
                                <option value="2">موبایل</option>
                                <option value="3">دیتابیس</option>
                            </select>
                    </div>

                    <div class="mx-5">
                        <button type="button" class="px-4 py-2 text-white bg-green-500 rounded-full" id="addQuestion"> + </button>
                        <button type="button" class="px-4 py-2 text-white bg-red-500 rounded-full"  id="removeQuestion"> - </button>
                    </div>
                </div>
                <div class="block w-full w-100" id="question-container">


                    @for ($i = 0; $i < 20; $i++)
                        @error("question_title_{$i}")
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                        @for ($j = 0; $j < 4; $j++)
                            @error("answer_{$i}_{$j}_title")
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        @endfor
                    @endfor

                </div>
                <div class="block w-full w-100">
                    <input type="hidden" name="countQuestion" id="countQuestion">
                </div>
                <div class="flex justify-center mt-5 w-100">
                    <input class="px-4 py-2 text-white bg-blue-500 rounded-md" type="submit" value="ثبت اطلاعات">
                </div>
            </form>
        </div>
    </section>

    <script>
        let countQuestion = 0;

        const createQuestion = (count) => {
            for (let i = 1; i <= count; i++) {
                const questionElement = `
            <div>
                <label for="question_title_${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان سوال ${i}</label>
                <input name="questions[${i}][title]" type="text" id="question_title_${i}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="عنوان سوال" required>
            </div>`;

                let answer_element = '';
                for (let j = 0; j < 4; j++) {
                    answer_element += `
                <div id="answer-${i}-${j}" class="flex my-2">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 rounded-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <input checked type="radio" name="questions[${i}][true_answer]" value="${j}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </span>
                    <input type="text" name="questions[${i}][answers][${j}]" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>`;
                }

                const question = `<div class="block w-full w-100" id="question-container-${i}">` + questionElement + answer_element + "</div>";
                $('#question-container').append(question);
            }
        };

        const removeQuestion = () => {


            $(`#question_title_${countQuestion}`).remove();
            $(`label[for= question_title_${countQuestion}]`).remove();
            $(`#answer-${countQuestion}-0`).remove();
            $(`#answer-${countQuestion}-1`).remove();
            $(`#answer-${countQuestion}-2`).remove();
            $(`#answer-${countQuestion}-3`).remove();

            countQuestion = countQuestion-1 ;
            $('#countQuestion').val(countQuestion)
        };

        const addQuestion = () => {

                const questionElement = `
                <div>
                    <label for="question_title_${countQuestion+1}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان سوال ${countQuestion+1}</label>
                    <input name="question_title_${countQuestion+1}" type="text" id="question_title_${countQuestion+1}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="عنوان سوال" required>
                </div>

                `;

                let answer_element = '';
                for(let j=0; j < 4; j++)
                {
                    answer_element += `
                    <div id="answer-${countQuestion+1}-${j}" class="flex my-2">
                      <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 rounded-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <input checked type="radio" name="true_answer_${countQuestion+1}[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      </span>
                        <input type="text" name="answer_${countQuestion+1}_${j}_title" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>`;
                }
                countQuestion = countQuestion+1 ;
                $('#countQuestion').val(countQuestion)
                let question = `<div class="block w-full w-100" id="question-container-${countQuestion+1}">` + questionElement + answer_element + "</div>";
                $('#question-container').append(question);


        };

        $('#total-question').on('change', (event) => {

            document.querySelector('#question-container').innerHTML = '';
            $('#question-container').empty();
            createQuestion(event.target.value);
            countQuestion = parseInt(event.target.value);
            $('#countQuestion').val(countQuestion)

        });
        $('#addQuestion').on('click', (event) => {
            addQuestion();

        });
        $('#removeQuestion').on('click', (event) => {
            removeQuestion()

        });

    </script>

@endsection
