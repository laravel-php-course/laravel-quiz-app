<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count())
            User::truncate();

        $farzad = User::factory(1)->create([
            'name' => 'FarzadUser',
            'email' => 'Farzad@mail.com',
            'mobile' => '09152363485',
            'verified_at' => '2023-12-31'
        ]);
        $this->command->info('created' . $farzad .' user');

        $Kourosh = User::factory(1)->create([
            'name' => 'KouroshUser',
            'email' => 'Kourosh@mail.com',
            'mobile' => '09150885270',
            'verified_at' => '2023-12-31'
        ]);
        $this->command->info('created' . $Kourosh .' user');
    }
}
