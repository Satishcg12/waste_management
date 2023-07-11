<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            [
                'name' => 'BCA',
            ],
            [
                'name' => 'BBA',
            ],
            [
                'name' => 'BBS',
            ],
            [
                'name' => 'BSC',
            ],
            [
                'name' => 'BIM',
            ],
            [
                'name' => 'BIT',
            ],
            [
                'name' => 'BHM',
            ],
            [
                'name' => 'BTTM',
            ],
            [
                'name' => 'BPH',
            ],

        ];
        foreach ($grades as $grade) {
            \App\Models\Grade::create($grade);
        }

    }
}
