<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(QuizSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
