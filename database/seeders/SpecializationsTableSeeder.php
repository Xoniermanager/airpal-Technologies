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
                'image_url' => 'site-data/specialties/Cardiology-1727261687.png',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-09-25 10:54:47',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Neurology',
                'description' => 'Deals with disorders of the nervous system.',
                'image_url' => 'site-data/specialties/Neurology-1727262036.png',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-09-25 11:00:36',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pediatrics',
                'description' => 'Deals with the medical care of infants, children, and adolescents.',
                'image_url' => 'site-data/specialties/Pediatrics-1727262086.webp',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-09-25 11:01:26',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dermatology',
                'description' => 'Deals with skin, hair, and nail conditions.',
                'image_url' => 'site-data/specialties/Dermatology-1727262125.jpeg',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-09-25 11:02:05',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Orthopedics',
                'description' => 'Deals with conditions involving the musculoskeletal',
                'image_url' => 'site-data/specialties/Orthopedics-1727262167.png',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-09-25 11:02:47',
            ),
        ));
        
        
    }
}