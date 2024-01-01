<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Teacher::count())
            Teacher::truncate();

        $farzad = Teacher::create([
            'name' => 'FarzadTeacher',
            'email' => 'FarzadTeacher@mail.com',
            'mobile' => '09012062304',
            'verified_at' => '2023-12-31',
            'national_code' => '0925306762'
        ]);
        $this->command->info('created' . $farzad .' teacher');

        $Kourosh = Teacher::create([
            'name' => 'KouroshTeacher',
            'email' => 'KouroshTeacher@mail.com',
            'mobile' => '09150885271',
            'verified_at' => '2023-12-31',
            'national_code' => '0925000000'
        ]);
        $this->command->info('created' . $Kourosh .' teacher');
    }
}
