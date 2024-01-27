<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Question::count())
            Question::truncate();

        $question1 = Question::create([
            'title' => 'کدام زبان هم برای وب است هم موبایل',
            'quiz_id' => '1',

        ]);
        $this->command->info('created' . $question1 . ' Question');

        $question2 = Question::create([
            'title' => 'کدام زبان برای موبایل است',
            'quiz_id' => '1',

        ]);
        $this->command->info('created' . $question2 . ' Question');

        $question3 = Question::create([
            'title' => 'کدام برند موبایل است',
            'quiz_id' => '2',

        ]);
        $this->command->info('created' . $question3 . ' Question');

        $question4 = Question::create([
            'title' => 'کدام برند موبایل نیست',
            'quiz_id' => '2',

        ]);
        $this->command->info('created' . $question4 . ' Question');

        $question5 = Question::create([
            'title' => 'کدام تگ برای لینک است',
            'quiz_id' => '3',

        ]);
        $this->command->info('created' . $question5 . ' Question');

        $question6 = Question::create([
            'title' => 'کدام تگ برای پاراگراف است',
            'quiz_id' => '3',

        ]);
        $this->command->info('created' . $question6 . ' Question');

        $question7 = Question::create([
            'title' => 'کدام تگ برای تیتر است',
            'quiz_id' => '4',

        ]);
        $this->command->info('created' . $question7 . ' Question');

        $question8 = Question::create([
            'title' => 'کدام تگ برای لیست است',
            'quiz_id' => '4',

        ]);
        $this->command->info('created' . $question8 . ' Question');

        $question9 = Question::create([
            'title' => 'کدام برای دریافت است',
            'quiz_id' => '5',

        ]);
        $this->command->info('created' . $question9 . ' Question');

        $question10 = Question::create([
            'title' => 'کدام برای بروزرسانی است',
            'quiz_id' => '5',

        ]);
        $this->command->info('created' . $question10 . ' Question');

        $question11 = Question::create([
            'title' => 'کدام برای دریافت محدود است',
            'quiz_id' => '6',

        ]);
        $this->command->info('created' . $question11 . ' Question');

        $question12 = Question::create([
            'title' => 'کدام برای افزودن است',
            'quiz_id' => '7',

        ]);
        $this->command->info('created' . $question12 . ' Question');

        $question13 = Question::create([
            'title' => 'کدام برای حذف است',
            'quiz_id' => '7',

        ]);
        $this->command->info('created' . $question13 . ' Question');

        $question14 = Question::create([
            'title' => 'کدام برای متن کوچک است',
            'quiz_id' => '8',

        ]);
        $this->command->info('created' . $question14 . ' Question');

        $question15 = Question::create([
            'title' => 'کدام برای جدول است',
            'quiz_id' => '8',

        ]);
        $this->command->info('created' . $question15 . ' Question');

        $question16 = Question::create([
            'title' => 'بزرک ترین تیتر کدام است',
            'quiz_id' => '9',

        ]);
        $this->command->info('created' . $question16 . ' Question');

        $question17 = Question::create([
            'title' => 'کوچک ترین تیتر کدام است',
            'quiz_id' => '9',

        ]);
        $this->command->info('created' . $question17 . ' Question');

    }
}
