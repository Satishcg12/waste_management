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
            'password' => bcrypt('satishCG'),
        ];
        Admin::create($admin);
    }
}
