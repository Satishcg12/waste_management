<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = [
            'name' => 'Admin',
            'email' => 'sung20700@gmail.com',
            'phone' => '1234567890',
            'password' => bcrypt('satishCG'),
        ];
        $admin2 = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '9876543210',
            'password' => bcrypt('12345678'),
        ];
        Admin::create($admin);
        Admin::create($admin2);
    }
}
