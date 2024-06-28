<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AwardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $awards = [
            [
                'name' => 'Dr. B. C. Roy Award',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '	McLaughlin Medal',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Om Prakash Bhasin Award',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'National Prize for Medicine',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Donald Mackay Medal',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Léo-Pariseau Prize',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into hospitals table
        DB::table('awards')->insert($awards);
    }
        
}
