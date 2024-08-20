<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('languages')->delete();
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'English',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Spanish',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'French',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'German',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Chinese',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Hindi',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
        ));
        
        
    }
}