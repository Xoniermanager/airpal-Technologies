<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorSpecialitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_specialities')->delete();
        
        \DB::table('doctor_specialities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'speciality_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'speciality_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'speciality_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'speciality_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'speciality_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'speciality_id' => 3,
                'created_at' => '2024-08-01 12:25:48',
                'updated_at' => '2024-08-01 12:25:48',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'speciality_id' => 2,
                'created_at' => '2024-08-02 09:22:24',
                'updated_at' => '2024-08-02 09:22:24',
            ),
        ));
        
        
    }
}