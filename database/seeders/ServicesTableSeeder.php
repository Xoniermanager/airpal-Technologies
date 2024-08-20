<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'General Consultation',
                'image' => 'http://example.com/images/general_consultation.jpg',
                'description' => 'A general health consultation to assess overall health.',
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cardiology Consultation',
                'image' => 'http://example.com/images/cardiology_consultation.jpg',
                'description' => 'Specialized consultation for heart-related issues.',
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Neurology Consultation',
                'image' => 'http://example.com/images/neurology_consultation.jpg',
                'description' => 'Specialized consultation for nervous system-related issues.',
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Pediatric Consultation',
                'image' => 'http://example.com/images/pediatric_consultation.jpg',
                'description' => 'Medical consultation for infants, children, and adolescents.',
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Dermatology Consultation',
                'image' => 'http://example.com/images/dermatology_consultation.jpg',
                'description' => 'Specialized consultation for skin, hair, and nail conditions.',
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
        ));
        
        
    }
}