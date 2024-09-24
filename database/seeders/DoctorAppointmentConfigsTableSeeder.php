<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorAppointmentConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_appointment_configs')->delete();
        
        \DB::table('doctor_appointment_configs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'slot_duration' => 30,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 30,
                'start_slots_from_date' => '2024-09-01',
                'stop_slots_date' => '2024-09-30',
                'status' => 1,
                'created_at' => '2024-09-01 11:16:04',
                'updated_at' => '2024-09-01 11:16:04',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'slot_duration' => 30,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 30,
                'start_slots_from_date' => '2024-09-01',
                'stop_slots_date' => '2024-09-30',
                'status' => 1,
                'created_at' => '2024-09-01 11:16:04',
                'updated_at' => '2024-09-01 11:16:04',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'slot_duration' => 30,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 30,
                'start_slots_from_date' => '2024-09-01',
                'stop_slots_date' => '2024-09-30',
                'status' => 1,
                'created_at' => '2024-09-01 11:16:04',
                'updated_at' => '2024-09-01 11:16:04',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'slot_duration' => 30,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 30,
                'start_slots_from_date' => '2024-09-01',
                'stop_slots_date' => '2024-09-30',
                'status' => 1,
                'created_at' => '2024-09-01 11:16:04',
                'updated_at' => '2024-09-01 11:16:04',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'slot_duration' => 30,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 30,
                'start_slots_from_date' => '2024-09-01',
                'stop_slots_date' => '2024-09-30',
                'status' => 1,
                'created_at' => '2024-09-01 11:16:04',
                'updated_at' => '2024-09-01 11:16:04',
            ),
        ));
        
        
    }
}