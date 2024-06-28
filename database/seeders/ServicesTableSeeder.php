<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'General Consultation',
                'image' => 'http://example.com/images/general_consultation.jpg',
                'description' => 'A general health consultation to assess overall health.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cardiology Consultation',
                'image' => 'http://example.com/images/cardiology_consultation.jpg',
                'description' => 'Specialized consultation for heart-related issues.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Neurology Consultation',
                'image' => 'http://example.com/images/neurology_consultation.jpg',
                'description' => 'Specialized consultation for nervous system-related issues.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pediatric Consultation',
                'image' => 'http://example.com/images/pediatric_consultation.jpg',
                'description' => 'Medical consultation for infants, children, and adolescents.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dermatology Consultation',
                'image' => 'http://example.com/images/dermatology_consultation.jpg',
                'description' => 'Specialized consultation for skin, hair, and nail conditions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
 
        ]);
    }
}
