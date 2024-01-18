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
            <form action="{{ route('quiz.add') }}" method="post">
                <div>
                    <label for="quiz_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عنوان امتحان</label>
                    <input name="quiz_title" type="text" id="quiz_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="عنوان امتحان" required>
                </div>


                <div class="w-100 flex items-center">
                    <div class="">
                        <label for="total-question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تعداد سوال درخواستی</label>
                        <select id="total-question" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="0">0</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>

                    <div class="mx-5">
                        <button class="py-2 px-4 rounded-full text-white bg-green-500"> + </button>
                        <button class="py-2 px-4 rounded-full text-white bg-red-500"> - </button>
                    </div>
                </div>
                <div class="w-100 w-full block" id="question-container">

                </div>
                <div class="flex justify-center w-100 mt-5">
                    <input class="py-2 px-4 rounded-md bg-blue-500 text-white" type="submit" value="ثبت اطلاعات">
                </div>
            </form>
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
                </div>`;

                let answer_element = '';
                for(let j=0; j < 4; j++)
                {
                    answer_element += `
                    <div id="answer-${i}-${j}" class="flex my-2">
                      <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <input checked type="radio" name="true_answer_${i}[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      </span>
                        <input type="text" name="answer_${i}_${j}_title" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>`;
                }

                const question = `<div class="w-100 w-full block" id="question-container-${i}">` + questionElement + answer_element + "</div>";
                $('#question-container').after(question);
            }
        };

        $('#total-question').on('change', (event) => {
            $('#question-container').html('');
            document.querySelector('#question-container').innerHTML = '';
            createQuestion(event.target.value);
        });
    </script>
@endsection
//TODO add function for + and - btn to add and remove questions
//TODO add quiz in admin page
//TODO make Custom Validation for create quiz in Http/Request/Quiz Dir
