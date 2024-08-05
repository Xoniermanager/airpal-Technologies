<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hospitals')->delete();
        
        \DB::table('hospitals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'General Hospital',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'City Medical Center',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Children\'s Hospital',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Community Health Center',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'University Medical Center',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Veterans Affairs Hospital',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
        ));
        
        
    }
}