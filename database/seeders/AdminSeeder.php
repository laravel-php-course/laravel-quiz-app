<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Admin::count())
            Admin::truncate();

        $farzad = Admin::create([
            'name' => 'FarzadAdmin',
            'email' => 'FarzadAdmin@mail.com',
            'mobile' => '09212167732',
            'rule' => Admin::ADMIN
        ]);
        $this->command->info('created' . $farzad .' admin');

        $Kourosh = Admin::create([
            'name' => 'KouroshAdmin',
            'email' => 'KouroshAdmin@mail.com',
            'mobile' => '09150885272',
            'rule' => Admin::SUPERADMIN
        ]);
        $this->command->info('created' . $Kourosh .' admin');
    }
}
