<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorWorkingHoursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_working_hours')->delete();
        
        \DB::table('doctor_working_hours')->insert(array (
            0 => 
            array (
                'id' => 1,
                'day_id' => 1,
                'user_id' => 1,
                'available' => 1,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            1 => 
            array (
                'id' => 2,
                'day_id' => 1,
                'user_id' => 2,
                'available' => 1,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            2 => 
            array (
                'id' => 3,
                'day_id' => 1,
                'user_id' => 3,
                'available' => 1,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            3 => 
            array (
                'id' => 4,
                'day_id' => 1,
                'user_id' => 4,
                'available' => 1,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            4 => 
            array (
                'id' => 5,
                'day_id' => 1,
                'user_id' => 5,
                'available' => 1,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
        ));
        
        
    }
}