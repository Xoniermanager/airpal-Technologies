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
                'appointment_fee' => '999',
                'slot_duration' => 30,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 20,
                'start_slots_from_date' => '2024-10-01',
                'stop_slots_date' => NULL,
                'status' => 1,
                'created_at' => '2024-09-01 11:16:04',
                'updated_at' => '2024-10-09 14:32:20',
                'config_start_date' => '2024-10-09',
                'config_end_date' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'appointment_fee' => '899',
                'slot_duration' => 30,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 20,
                'start_slots_from_date' => '2024-10-01',
                'stop_slots_date' => NULL,
                'status' => 1,
                'created_at' => '2024-09-01 11:16:04',
                'updated_at' => '2024-10-09 10:06:27',
                'config_start_date' => '2024-10-09',
                'config_end_date' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'appointment_fee' => '1999',
                'slot_duration' => 30,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 20,
                'start_slots_from_date' => '2024-10-01',
                'stop_slots_date' => NULL,
                'status' => 1,
                'created_at' => '2024-09-01 11:16:04',
                'updated_at' => '2024-10-09 15:44:22',
                'config_start_date' => '2024-10-09',
                'config_end_date' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'appointment_fee' => '1599',
                'slot_duration' => 60,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 30,
                'start_slots_from_date' => '2024-10-10',
                'stop_slots_date' => NULL,
                'status' => 1,
                'created_at' => '2024-10-10 11:48:33',
                'updated_at' => '2024-10-10 11:48:33',
                'config_start_date' => '2024-10-10',
                'config_end_date' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'appointment_fee' => '700',
                'slot_duration' => 50,
                'cleanup_interval' => 10,
                'start_month' => 1,
                'end_month' => 30,
                'slots_in_advance' => 30,
                'start_slots_from_date' => '2024-10-10',
                'stop_slots_date' => NULL,
                'status' => 1,
                'created_at' => '2024-10-10 11:50:23',
                'updated_at' => '2024-10-10 11:50:23',
                'config_start_date' => '2024-10-10',
                'config_end_date' => NULL,
            ),
        ));
        
        
    }
}