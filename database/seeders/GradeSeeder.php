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
            //from nursary to class 10
            [
                'name' => 'Nursary',
            ],
            [
                'name' => 'LKG',
            ],
            [
                'name' => 'UKG',
            ],
            [
                'name' => '1',
            ],
            [
                'name' => '2',
            ],
            [
                'name' => '3',
            ],
            [
                'name' => '4',
            ],
            [
                'name' => '5',
            ],
            [
                'name' => '6',
            ],
            [
                'name' => '7',
            ],
            [
                'name' => '8',
            ],
            [
                'name' => '9',
            ],
            [
                'name' => '10',
            ],
            // +2
            [
                'name' => '11',
            ],
            [
                'name' => '12',
            ],
            // bachelors
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
