<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Grade::factory()->create([
        //     'name' => 'BCA',
        // ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('satishCG'),
        //     'grade_id' => 1,
        // ]);
        $this->call([
            AdminSeeder::class,
            GradeSeeder::class,
            UserSeeder::class,
            TeacherSeeder::class,
        ]);
    }
}
