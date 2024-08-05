<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'California',
                'status' => 1,
                'country_id' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Texas',
                'status' => 1,
                'country_id' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'New York',
                'status' => 1,
                'country_id' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Ontario',
                'status' => 1,
                'country_id' => 2,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Quebec',
                'status' => 1,
                'country_id' => 2,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'British Columbia',
                'status' => 1,
                'country_id' => 2,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'England',
                'status' => 1,
                'country_id' => 3,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Scotland',
                'status' => 1,
                'country_id' => 3,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Wales',
                'status' => 1,
                'country_id' => 3,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Uttar Pradesh',
                'status' => 1,
                'country_id' => 4,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Bihar',
                'status' => 1,
                'country_id' => 4,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Udisa',
                'status' => 1,
                'country_id' => 4,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
        ));
        
        
    }
}