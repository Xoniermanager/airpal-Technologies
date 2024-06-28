<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            [
                'name' => 'Cardiology',
                'description' => 'Deals with disorders of the heart and blood vessels.',
                'image_url' => 'http://example.com/images/cardiology.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Neurology',
                'description' => 'Deals with disorders of the nervous system.',
                'image_url' => 'http://example.com/images/neurology.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pediatrics',
                'description' => 'Deals with the medical care of infants, children, and adolescents.',
                'image_url' => 'http://example.com/images/pediatrics.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dermatology',
                'description' => 'Deals with skin, hair, and nail conditions.',
                'image_url' => 'http://example.com/images/dermatology.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Orthopedics',
                'description' => 'Deals with conditions involving the musculoskeletal',
                'image_url' => 'http://example.com/images/dermatology.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ]);
            }
}
