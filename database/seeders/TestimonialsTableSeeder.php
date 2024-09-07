<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('testimonials')->delete();
        
        \DB::table('testimonials')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title' => 'What Our Client Says',
                'username' => 'John Doe',
                'address' => 'New York',
                'image' => 'testimonial/What Our Client Says-1725711622.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
commodo consequat.',
                'status' => 1,
                'created_at' => '2024-09-05 18:00:03',
                'updated_at' => '2024-09-07 12:49:32',
            ),
            1 => 
            array (
                'id' => 4,
                'title' => 'What Our Client Says',
                'username' => 'John Doe',
                'address' => 'New York',
                'image' => 'testimonial/What Our Client Says-1725711805.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
veniam, quis nostrud exercitation',
                'status' => 1,
                'created_at' => '2024-09-06 04:18:36',
                'updated_at' => '2024-09-07 12:24:20',
            ),
            2 => 
            array (
                'id' => 5,
                'title' => 'What Our Client Says',
                'username' => 'John Doe',
                'address' => 'New York',
                'image' => 'testimonial/What Our Client Says-1725712163.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
commodo consequat.',
                'status' => 1,
                'created_at' => '2024-09-07 09:46:06',
                'updated_at' => '2024-09-07 12:29:23',
            ),
            3 => 
            array (
                'id' => 6,
                'title' => 'What Our Client Says',
                'username' => 'John Doe',
                'address' => 'New York',
                'image' => 'testimonial/What Our Client Says-1725711932.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
commodo consequat.',
                'status' => 1,
                'created_at' => '2024-09-07 09:46:50',
                'updated_at' => '2024-09-07 12:25:32',
            ),
        ));
        
        
    }
}