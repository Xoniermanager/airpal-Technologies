<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faq_categories')->delete();
        
        \DB::table('faq_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'User/Patient',
                'status' => 1,
                'created_at' => '2024-09-22 14:39:28',
                'updated_at' => '2024-09-22 14:39:28',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Doctor',
                'status' => 1,
                'created_at' => '2024-09-22 14:39:38',
                'updated_at' => '2024-09-22 14:39:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pharmacy',
                'status' => 1,
                'created_at' => '2024-09-22 14:39:47',
                'updated_at' => '2024-09-22 14:39:47',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Hospital',
                'status' => 1,
                'created_at' => '2024-09-22 14:39:52',
                'updated_at' => '2024-09-22 14:39:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Test Lab',
                'status' => 1,
                'created_at' => '2024-09-22 14:40:07',
                'updated_at' => '2024-09-22 14:40:07',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Caretaker',
                'status' => 1,
                'created_at' => '2024-09-22 14:40:15',
                'updated_at' => '2024-09-22 14:40:15',
            ),
        ));
        
        
    }
}