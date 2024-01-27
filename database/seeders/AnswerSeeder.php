<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Answer::count())
            Answer::truncate();

        $answer1 = Answer::create([
            'question_id' => '1',
            'body' => 'جاوا',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer1 . ' Answer');

        $answer2 = Answer::create([
            'question_id' => '1',
            'body' => 'پی اچ پی',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer2 . ' Answer');

        $answer3 = Answer::create([
            'question_id' => '1',
            'body' => 'کاتلین',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer3 . ' Answer');

        $answer4 = Answer::create([
            'question_id' => '1',
            'body' => 'جاوا اسکریپت',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer4 . ' Answer');

        $answer5 = Answer::create([
            'question_id' => '2',
            'body' => 'جاوا',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer5 . ' Answer');

        $answer6 = Answer::create([
            'question_id' => '2',
            'body' => 'اچ تی ام ال',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer6 . ' Answer');

        $answer7 = Answer::create([
            'question_id' => '2',
            'body' => 'سی اس اس',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer7 . ' Answer');

        $answer8 = Answer::create([
            'question_id' => '2',
            'body' => 'تلویند',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer8 . ' Answer');

        $answer9 = Answer::create([
            'question_id' => '3',
            'body' => 'تسلا',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer9 . ' Answer');

        $answer10 = Answer::create([
            'question_id' => '3',
            'body' => 'استیو جابز',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer10 . ' Answer');

        $answer11 = Answer::create([
            'question_id' => '3',
            'body' => 'همراه اول',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer11 . ' Answer');

        $answer12 = Answer::create([
            'question_id' => '3',
            'body' => 'سونی',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer12 . ' Answer');

        $answer13 = Answer::create([
            'question_id' => '4',
            'body' => 'اپل',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer13 . ' Answer');

        $answer14 = Answer::create([
            'question_id' => '4',
            'body' => 'دوو',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer14 . ' Answer');

        $answer15 = Answer::create([
            'question_id' => '4',
            'body' => 'شیاومی',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer15 . ' Answer');

        $answer16 = Answer::create([
            'question_id' => '4',
            'body' => 'سامسونگ',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer16 . ' Answer');

        $answer17 = Answer::create([
            'question_id' => '5',
            'body' => 'link',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer17 . ' Answer');

        $answer18 = Answer::create([
            'question_id' => '5',
            'body' => 'a',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer18 . ' Answer');

        $answer19 = Answer::create([
            'question_id' => '5',
            'body' => 'href',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer19 . ' Answer');

        $answer20 = Answer::create([
            'question_id' => '5',
            'body' => 'address',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer20 . ' Answer');

        $answer21 = Answer::create([
            'question_id' => '6',
            'body' => 'pra',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer21 . ' Answer');

        $answer22 = Answer::create([
            'question_id' => '6',
            'body' => 'paragraph',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer22 . ' Answer');

        $answer23 = Answer::create([
            'question_id' => '6',
            'body' => 'prg',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer23 . ' Answer');

        $answer24 = Answer::create([
            'question_id' => '6',
            'body' => 'p',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer24 . ' Answer');

        $answer25 = Answer::create([
            'question_id' => '7',
            'body' => 't',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer25 . ' Answer');

        $answer26 = Answer::create([
            'question_id' => '7',
            'body' => 'th',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer26 . ' Answer');

        $answer27 = Answer::create([
            'question_id' => '7',
            'body' => 'h',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer27 . ' Answer');

        $answer28 = Answer::create([
            'question_id' => '7',
            'body' => 'head',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer28 . ' Answer');

        $answer29 = Answer::create([
            'question_id' => '8',
            'body' => 'l',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer29 . ' Answer');

        $answer30 = Answer::create([
            'question_id' => '8',
            'body' => 'li',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer30 . ' Answer');

        $answer31 = Answer::create([
            'question_id' => '8',
            'body' => 'ly',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer31 . ' Answer');

        $answer32 = Answer::create([
            'question_id' => '8',
            'body' => 'el',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer32 . ' Answer');

        $answer33 = Answer::create([
            'question_id' => '9',
            'body' => 'all()',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer33 . ' Answer');

        $answer34 = Answer::create([
            'question_id' => '9',
            'body' => 'select',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer34 . ' Answer');


        $answer35= Answer::create([
            'question_id' => '9',
            'body' => '*',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer35 . ' Answer');


        $answer36 = Answer::create([
            'question_id' => '9',
            'body' => 'get',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer36 . ' Answer');


        $answer37 = Answer::create([
            'question_id' => '10',
            'body' => 'update',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer37 . ' Answer');


        $answer38 = Answer::create([
            'question_id' => '10',
            'body' => 'fill',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer38 . ' Answer');

        $answer39 = Answer::create([
            'question_id' => '10',
            'body' => 'select fill',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer39 . ' Answer');


        $answer40 = Answer::create([
            'question_id' => '10',
            'body' => 'select',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer40 . ' Answer');


        $answer41 = Answer::create([
            'question_id' => '11',
            'body' => 'order',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer41 . ' Answer');


        $answer42 = Answer::create([
            'question_id' => '11',
            'body' => 'find',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer42 . ' Answer');


        $answer43 = Answer::create([
            'question_id' => '11',
            'body' => 'limit',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer43 . ' Answer');


        $answer44 = Answer::create([
            'question_id' => '11',
            'body' => 'نداریم همچین چیزی در مای اسکیوال',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer44 . ' Answer');


        $answer45 = Answer::create([
            'question_id' => '12',
            'body' => 'up',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer45 . ' Answer');


        $answer46 = Answer::create([
            'question_id' => '12',
            'body' => 'inser',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer46 . ' Answer');


        $answer47 = Answer::create([
            'question_id' => '12',
            'body' => 'put',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer47 . ' Answer');


        $answer48 = Answer::create([
            'question_id' => '12',
            'body' => 'path',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer48 . ' Answer');


        $answer49 = Answer::create([
            'question_id' => '13',
            'body' => 'del',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer49 . ' Answer');


        $answer50 = Answer::create([
            'question_id' => '13',
            'body' => '9',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer50 . ' Answer');


        $answer51 = Answer::create([
            'question_id' => '13',
            'body' => 'remove',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer51 . ' Answer');

        $answer52 = Answer::create([
            'question_id' => '13',
            'body' => 'delete',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer52 . ' Answer');

        $answer53 = Answer::create([
            'question_id' => '14',
            'body' => 'small',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer53 . ' Answer');

        $answer54 = Answer::create([
            'question_id' => '14',
            'body' => 'sm',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer54 . ' Answer');

        $answer55 = Answer::create([
            'question_id' => '14',
            'body' => 'sml',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer55 . ' Answer');

        $answer56 = Answer::create([
            'question_id' => '14',
            'body' => 'text_sml',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer56 . ' Answer');

        $answer57 = Answer::create([
            'question_id' => '15',
            'body' => 'table',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer57 . ' Answer');

        $answer58 = Answer::create([
            'question_id' => '15',
            'body' => 'ul',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer58 . ' Answer');


        $answer59 = Answer::create([
            'question_id' => '15',
            'body' => 'tl',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer59 . ' Answer');


        $answer60 = Answer::create([
            'question_id' => '15',
            'body' => 'ol',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer60 . ' Answer');

        $answer61 = Answer::create([
            'question_id' => '16',
            'body' => 'h2',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer61 . ' Answer');

        $answer62 = Answer::create([
            'question_id' => '16',
            'body' => 'h1',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer62 . ' Answer');

        $answer63 = Answer::create([
            'question_id' => '16',
            'body' => 'h6',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer63 . ' Answer');

        $answer64 = Answer::create([
            'question_id' => '16',
            'body' => 'h0',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer64 . ' Answer');

        $answer65 = Answer::create([
            'question_id' => '17',
            'body' => 'h0',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer65 . ' Answer');

        $answer66 = Answer::create([
            'question_id' => '17',
            'body' => 'h1',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer66 . ' Answer');

        $answer67 = Answer::create([
            'question_id' => '17',
            'body' => 'h2',
            'is_true_answer' => 0

        ]);
        $this->command->info('created' . $answer67 . ' Answer');

        $answer68 = Answer::create([
            'question_id' => '17',
            'body' => 'h6',
            'is_true_answer' => 1

        ]);
        $this->command->info('created' . $answer68 . ' Answer');



    }
}
