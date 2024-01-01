<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Category::count())
            Category::truncate();

        $categories = ['وب', 'موبایل', 'دیتابیس'];

        foreach ($categories as $category)
        {
            Category::create([
                'title' => $category
            ]);
            $this->command->info('add: ' . $category . ' category');
        }
    }
}
