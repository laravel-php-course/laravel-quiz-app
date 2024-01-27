<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Quiz::count())
            Quiz::truncate();

        $mobile1 = Quiz::create([
            'title' => 'سوالات تخصصی موبایل پارت 1',
            'creator_type' => 'App\Models\Teacher',
            'creator_id' => '2',
            'category_id' => '2',
            'total_questions' => '2' ,
            'quiz_time' => '60'
        ]);
        $this->command->info('created' . $mobile1 .' Quiz');

        $mobile2 = Quiz::create([
            'title' => 'سوالات تخصصی موبایل پارت 2',
            'creator_type' => 'App\Models\Teacher',
            'creator_id' => '2',
            'category_id' => '2',
            'total_questions' => '2',
            'quiz_time' => '70'
        ]);
        $this->command->info('created' . $mobile2 .' Quiz');

        $mobile3 = Quiz::create([
            'title' => 'سوالات تخصصی وب پارت 1',
            'creator_type' => 'App\Models\Teacher',
            'creator_id' => '2',
            'category_id' => '1',
            'total_questions' => '2',
            'quiz_time' => '40'
        ]);
        $this->command->info('created' . $mobile3 .' Quiz');

        $mobile4 = Quiz::create([
            'title' => 'سوالات تخصصی وب پارت 2',
            'creator_type' => 'App\Models\Teacher',
            'creator_id' => '2',
            'category_id' => '1',
            'total_questions' => '2',
            'quiz_time' => '20'
        ]);
        $this->command->info('created' . $mobile4 .' Quiz');

        $mobile5 = Quiz::create([
            'title' => 'سوالات تخصصی دیتابیس پارت 1',
            'creator_type' => 'App\Models\Teacher',
            'creator_id' => '1',
            'category_id' => '3',
            'total_questions' => '2',
            'quiz_time' => '15'
        ]);
        $this->command->info('created' . $mobile5 .' Quiz');

        $mobile6 = Quiz::create([
            'title' => 'سوالات غیر تخصصی دیتابیس ',
            'creator_type' => 'App\Models\Teacher',
            'creator_id' => '1',
            'category_id' => '3',
            'total_questions' => '1',
            'quiz_time' => '20'
        ]);
        $this->command->info('created' . $mobile6 .' Quiz');

        $mobile7 = Quiz::create([
            'title' => 'سوالات تخصصی دیتابیس پارت 2',
            'creator_type' => 'App\Models\Teacher',
            'creator_id' => '1',
            'category_id' => '3',
            'total_questions' => '2',
            'quiz_time' => '60'
        ]);
        $this->command->info('created' . $mobile7 .' Quiz');

        $mobile8 = Quiz::create([
            'title' => 'سوالات طراحی شده توسط ادمین کوروش وب پارت 1',
            'creator_type' => 'App\Models\Admin',
            'creator_id' => '2',
            'category_id' => '1',
            'total_questions' => '2',
            'quiz_time' => '2'
        ]);
        $this->command->info('created' . $mobile8 .' Quiz');

        $mobile9 = Quiz::create([
            'title' => 'سوالات طراحی شده توسط ادمین فرزاد وب پارت 2',
            'creator_type' => 'App\Models\Admin',
            'creator_id' => '1',
            'category_id' => '1',
            'total_questions' => '2',
            'quiz_time' => '6'
        ]);
        $this->command->info('created' . $mobile9 .' Quiz');
    }
}
