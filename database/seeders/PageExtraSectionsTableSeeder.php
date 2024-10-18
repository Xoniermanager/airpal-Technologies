<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageExtraSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('page_extra_sections')->delete();
        
        \DB::table('page_extra_sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'page_id' => 1,
                'model' => 'App\\Models\\User',
                'order_by' => 'desc',
                'order_with_column' => 'experience_years',
                'no_of_records' => '6',
                'status' => 1,
                'created_at' => '2024-09-10 05:37:37',
                'updated_at' => '2024-09-27 04:20:25',
            ),
            1 => 
            array (
                'id' => 2,
                'page_id' => 1,
                'model' => 'App\\Models\\Testimonial',
                'order_by' => 'asc',
                'order_with_column' => 'created_at',
                'no_of_records' => '5',
                'status' => 1,
                'created_at' => '2024-09-10 07:05:48',
                'updated_at' => '2024-09-27 04:20:25',
            ),
            2 => 
            array (
                'id' => 5,
                'page_id' => 2,
                'model' => 'App\\Models\\User',
                'order_by' => 'desc',
                'order_with_column' => 'allover_rating',
                'no_of_records' => '8',
                'status' => 1,
                'created_at' => '2024-09-10 09:15:15',
                'updated_at' => '2024-09-26 11:50:34',
            ),
            3 => 
            array (
                'id' => 6,
                'page_id' => 2,
                'model' => 'App\\Models\\Testimonial',
                'order_by' => 'asc',
                'order_with_column' => 'created_at',
                'no_of_records' => '3',
                'status' => 1,
                'created_at' => '2024-09-10 09:15:15',
                'updated_at' => '2024-09-26 11:50:34',
            ),
            4 => 
            array (
                'id' => 7,
                'page_id' => 4,
                'model' => 'App\\Models\\User',
                'order_by' => 'asc',
                'order_with_column' => 'allover_rating',
                'no_of_records' => '4',
                'status' => 1,
                'created_at' => '2024-09-10 09:32:06',
                'updated_at' => '2024-09-10 09:32:06',
            ),
        ));
        
        
    }
}