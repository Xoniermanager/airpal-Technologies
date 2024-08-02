<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpecializationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('specializations')->delete();
        
        \DB::table('specializations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Cardiology',
                'description' => 'Deals with disorders of the heart and blood vessels.',
                'image_url' => 'http://example.com/images/cardiology.jpg',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Neurology',
                'description' => 'Deals with disorders of the nervous system.',
                'image_url' => 'http://example.com/images/neurology.jpg',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pediatrics',
                'description' => 'Deals with the medical care of infants, children, and adolescents.',
                'image_url' => 'http://example.com/images/pediatrics.jpg',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dermatology',
                'description' => 'Deals with skin, hair, and nail conditions.',
                'image_url' => 'http://example.com/images/dermatology.jpg',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Orthopedics',
                'description' => 'Deals with conditions involving the musculoskeletal',
                'image_url' => 'http://example.com/images/dermatology.jpg',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
        ));
        
        
    }
}