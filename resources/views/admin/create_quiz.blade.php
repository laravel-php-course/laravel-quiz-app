@extends('teacher.template')

@section('title')
    ایجاد امتحان
@endsection

@section('content')
    <section class="p-4">
        <div class="bg-white py-3 px-2 rounded-md shadow-sm">
            <header>
                <h1 class="text-center text-gray-800">
                    افزودن امتحان جدید
                </h1>
            </header>
            <form action="/quiz/add" method="post">
                @csrf
                <div>
                    <label for="quiz_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان امتحان</label>
                    <input name="quiz_title" type="text" id="quiz_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="عنوان امتحان" required>
                </div>


                <div class="w-100 flex items-center">
                    <div class="">
                        <label for="total-question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تعداد سوال درخواستی</label>
                        <select id="total-question" name="quize_count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="0">0</option>
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
                    </div>

                <div class="w-100 w-full block" id="question-container">

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
                <div class="w-100 w-full block">
                    <input type="hidden" name="countQuestion" id="countQuestion">
                </div>
                <div class="flex justify-center w-100 mt-5">
                    <input class="py-2 px-4 rounded-md bg-blue-500 text-white" type="submit" value="ثبت اطلاعات">
                </div>
            </form>
            <div class="mx-5">
                <button class="py-2 px-4 rounded-full text-white bg-green-500" id="addQuestion"> + </button>
                <button class="py-2 px-4 rounded-full text-white bg-red-500"  id="removeQuestion"> - </button>
            </div>
        </div>
    </section>

    <script>
        let countQuestion = 0;

        const createQuestion = (count) => {

            for(let i = count; i >= 1; i--)
            {
                const questionElement = `
                <div>
                    <label for="question_title_${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان سوال ${i}</label>
                    <input name="question_title_${i}" type="text" id="question_title_${i}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="عنوان سوال" required>
                </div>

`;


                let answer_element = '';
                for(let j=0; j < 4; j++)
                {
                    answer_element += `
                    <div id="answer-${i}-${j}" class="flex my-2">
                      <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <input checked type="radio" name="true_answer_${i}[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      </span>
                        <input type="text" name="answer_${i}_${j}_title" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

`;
                }
                let counter = parseInt(count)
                countQuestion = counter ;
                $('#countQuestion').val(counter)
                let question = `<div class="w-100 w-full block" id="question-container-${i}">` + questionElement + answer_element + "</div>";
                $('#question-container').prepend(question);

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
                      <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <input checked type="radio" name="true_answer_${countQuestion+1}[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      </span>
                        <input type="text" name="answer_${countQuestion+1}_${j}_title" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>`;
                }
                countQuestion = countQuestion+1 ;
                $('#countQuestion').val(countQuestion)
                let question = `<div class="w-100 w-full block" id="question-container-${countQuestion+1}">` + questionElement + answer_element + "</div>";
                $('#question-container').append(question);


        };

        $('#total-question').on('change', (event) => {

            document.querySelector('#question-container').innerHTML = '';
            $('#question-container').empty();
            createQuestion(event.target.value);

        });
        $('#addQuestion').on('click', (event) => {
console.log('djd')
            addQuestion();

        });
        $('#removeQuestion').on('click', (event) => {
            console.log('djd')
            removeQuestion()

        });

    </script>
{{--    FINISHED add function for + and - btn to add and remove questions--}}


@endsection
