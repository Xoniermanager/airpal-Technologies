<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'name' => 'Medical Science',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dental Surgery',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pediatrics',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BPT',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MBBS',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MS',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BDS',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BPharm',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MD',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MPH',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more courses as needed
        ];

        DB::table('courses')->insert($courses);
    }
}
