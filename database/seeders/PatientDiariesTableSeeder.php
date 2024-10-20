<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientDiariesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('patient_diaries')->delete();
        
        \DB::table('patient_diaries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 62.0,
                'oxygen_level' => 99.0,
                'weight' => 72.0,
                'bp' => 130.0,
                'avg_body_temp' => 33.0,
                'avg_heart_beat' => 60.0,
                'glucose' => NULL,
                'created_at' => '2024-08-16 05:54:28',
                'updated_at' => '2024-08-16 05:54:28',
            ),
            1 => 
            array (
                'id' => 2,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 62.0,
                'oxygen_level' => 99.0,
                'weight' => 72.0,
                'bp' => 130.0,
                'avg_body_temp' => 33.0,
                'avg_heart_beat' => 66.0,
                'glucose' => NULL,
                'created_at' => '2024-08-17 05:54:28',
                'updated_at' => '2024-08-17 05:54:28',
            ),
            2 => 
            array (
                'id' => 3,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 62.0,
                'oxygen_level' => 99.0,
                'weight' => 72.0,
                'bp' => 130.0,
                'avg_body_temp' => 33.0,
                'avg_heart_beat' => 72.0,
                'glucose' => NULL,
                'created_at' => '2024-08-13 05:54:28',
                'updated_at' => '2024-08-13 05:54:28',
            ),
            3 => 
            array (
                'id' => 4,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 88.0,
                'oxygen_level' => 98.0,
                'weight' => 72.0,
                'bp' => 70.0,
                'avg_body_temp' => 33.0,
                'avg_heart_beat' => 78.0,
                'glucose' => NULL,
                'created_at' => '2024-08-08 05:54:28',
                'updated_at' => '2024-08-08 05:54:28',
            ),
            4 => 
            array (
                'id' => 5,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 62.0,
                'oxygen_level' => 99.0,
                'weight' => 72.0,
                'bp' => 170.0,
                'avg_body_temp' => 33.0,
                'avg_heart_beat' => 88.0,
                'glucose' => NULL,
                'created_at' => '2024-08-18 05:54:28',
                'updated_at' => '2024-08-18 05:54:28',
            ),
            5 => 
            array (
                'id' => 6,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 62.0,
                'oxygen_level' => 99.0,
                'weight' => 72.0,
                'bp' => 170.0,
                'avg_body_temp' => 33.0,
                'avg_heart_beat' => 70.0,
                'glucose' => NULL,
                'created_at' => '2024-08-19 00:00:00',
                'updated_at' => '2024-08-19 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 62.0,
                'oxygen_level' => 99.0,
                'weight' => 72.0,
                'bp' => 180.0,
                'avg_body_temp' => 33.0,
                'avg_heart_beat' => 66.0,
                'glucose' => NULL,
                'created_at' => '2024-08-20 00:00:00',
                'updated_at' => '2024-08-20 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 62.0,
                'oxygen_level' => 99.0,
                'weight' => 72.0,
                'bp' => 189.0,
                'avg_body_temp' => 33.0,
                'avg_heart_beat' => 69.0,
                'glucose' => NULL,
                'created_at' => '2024-08-21 00:00:00',
                'updated_at' => '2024-08-21 00:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 63.0,
                'oxygen_level' => 98.0,
                'weight' => 72.0,
                'bp' => 188.0,
                'avg_body_temp' => 34.0,
                'avg_heart_beat' => 70.0,
                'glucose' => NULL,
                'created_at' => '2024-08-22 00:00:00',
                'updated_at' => '2024-08-22 00:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 64.0,
                'oxygen_level' => 97.0,
                'weight' => 72.0,
                'bp' => 187.0,
                'avg_body_temp' => 35.0,
                'avg_heart_beat' => 71.0,
                'glucose' => NULL,
                'created_at' => '2024-08-23 00:00:00',
                'updated_at' => '2024-08-23 00:00:00',
            ),
            10 => 
            array (
                'id' => 11,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 65.0,
                'oxygen_level' => 96.0,
                'weight' => 72.0,
                'bp' => 186.0,
                'avg_body_temp' => 36.0,
                'avg_heart_beat' => 55.0,
                'glucose' => NULL,
                'created_at' => '2024-08-24 00:00:00',
                'updated_at' => '2024-08-24 00:00:00',
            ),
            11 => 
            array (
                'id' => 12,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 66.0,
                'oxygen_level' => 95.0,
                'weight' => 72.0,
                'bp' => 185.0,
                'avg_body_temp' => 37.0,
                'avg_heart_beat' => 73.0,
                'glucose' => NULL,
                'created_at' => '2024-08-25 00:00:00',
                'updated_at' => '2024-08-25 00:00:00',
            ),
            12 => 
            array (
                'id' => 13,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 67.0,
                'oxygen_level' => 94.0,
                'weight' => 72.0,
                'bp' => 184.0,
                'avg_body_temp' => 38.0,
                'avg_heart_beat' => 74.0,
                'glucose' => NULL,
                'created_at' => '2024-08-26 00:00:00',
                'updated_at' => '2024-08-26 00:00:00',
            ),
            13 => 
            array (
                'id' => 14,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 68.0,
                'oxygen_level' => 93.0,
                'weight' => 72.0,
                'bp' => 183.0,
                'avg_body_temp' => 39.0,
                'avg_heart_beat' => 62.0,
                'glucose' => NULL,
                'created_at' => '2024-08-27 00:00:00',
                'updated_at' => '2024-08-27 00:00:00',
            ),
            14 => 
            array (
                'id' => 15,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 69.0,
                'oxygen_level' => 92.0,
                'weight' => 72.0,
                'bp' => 182.0,
                'avg_body_temp' => 40.0,
                'avg_heart_beat' => 56.0,
                'glucose' => NULL,
                'created_at' => '2024-08-28 00:00:00',
                'updated_at' => '2024-08-28 00:00:00',
            ),
            15 => 
            array (
                'id' => 16,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 70.0,
                'oxygen_level' => 91.0,
                'weight' => 72.0,
                'bp' => 181.0,
                'avg_body_temp' => 41.0,
                'avg_heart_beat' => 67.0,
                'glucose' => NULL,
                'created_at' => '2024-08-29 00:00:00',
                'updated_at' => '2024-08-29 00:00:00',
            ),
            16 => 
            array (
                'id' => 17,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 71.0,
                'oxygen_level' => 90.0,
                'weight' => 72.0,
                'bp' => 180.0,
                'avg_body_temp' => 42.0,
                'avg_heart_beat' => 78.0,
                'glucose' => NULL,
                'created_at' => '2024-08-30 00:00:00',
                'updated_at' => '2024-08-30 00:00:00',
            ),
            17 => 
            array (
                'id' => 18,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 72.0,
                'oxygen_level' => 89.0,
                'weight' => 72.0,
                'bp' => 179.0,
                'avg_body_temp' => 43.0,
                'avg_heart_beat' => 55.0,
                'glucose' => NULL,
                'created_at' => '2024-08-31 00:00:00',
                'updated_at' => '2024-08-31 00:00:00',
            ),
            18 => 
            array (
                'id' => 39,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 60.0,
                'oxygen_level' => 98.0,
                'weight' => 72.0,
                'bp' => 190.0,
                'avg_body_temp' => 34.0,
                'avg_heart_beat' => 68.0,
                'glucose' => NULL,
                'created_at' => '2024-07-01 00:00:00',
                'updated_at' => '2024-07-01 00:00:00',
            ),
            19 => 
            array (
                'id' => 40,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 61.0,
                'oxygen_level' => 97.0,
                'weight' => 72.0,
                'bp' => 189.0,
                'avg_body_temp' => 35.0,
                'avg_heart_beat' => 69.0,
                'glucose' => NULL,
                'created_at' => '2024-07-02 00:00:00',
                'updated_at' => '2024-07-02 00:00:00',
            ),
            20 => 
            array (
                'id' => 41,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 62.0,
                'oxygen_level' => 96.0,
                'weight' => 71.0,
                'bp' => 188.0,
                'avg_body_temp' => 36.0,
                'avg_heart_beat' => 66.0,
                'glucose' => NULL,
                'created_at' => '2024-07-03 00:00:00',
                'updated_at' => '2024-07-03 00:00:00',
            ),
            21 => 
            array (
                'id' => 42,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 63.0,
                'oxygen_level' => 95.0,
                'weight' => 75.0,
                'bp' => 187.0,
                'avg_body_temp' => 37.0,
                'avg_heart_beat' => 44.0,
                'glucose' => NULL,
                'created_at' => '2024-07-04 00:00:00',
                'updated_at' => '2024-07-04 00:00:00',
            ),
            22 => 
            array (
                'id' => 43,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 64.0,
                'oxygen_level' => 94.0,
                'weight' => 66.0,
                'bp' => 186.0,
                'avg_body_temp' => 38.0,
                'avg_heart_beat' => 44.0,
                'glucose' => NULL,
                'created_at' => '2024-07-05 00:00:00',
                'updated_at' => '2024-07-05 00:00:00',
            ),
            23 => 
            array (
                'id' => 44,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 65.0,
                'oxygen_level' => 93.0,
                'weight' => 67.0,
                'bp' => 185.0,
                'avg_body_temp' => 39.0,
                'avg_heart_beat' => 73.0,
                'glucose' => NULL,
                'created_at' => '2024-07-06 00:00:00',
                'updated_at' => '2024-07-06 00:00:00',
            ),
            24 => 
            array (
                'id' => 45,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 66.0,
                'oxygen_level' => 92.0,
                'weight' => 68.0,
                'bp' => 184.0,
                'avg_body_temp' => 40.0,
                'avg_heart_beat' => 66.0,
                'glucose' => NULL,
                'created_at' => '2024-07-07 00:00:00',
                'updated_at' => '2024-07-07 00:00:00',
            ),
            25 => 
            array (
                'id' => 46,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 67.0,
                'oxygen_level' => 91.0,
                'weight' => 55.0,
                'bp' => 183.0,
                'avg_body_temp' => 41.0,
                'avg_heart_beat' => 75.0,
                'glucose' => NULL,
                'created_at' => '2024-07-08 00:00:00',
                'updated_at' => '2024-07-08 00:00:00',
            ),
            26 => 
            array (
                'id' => 47,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 68.0,
                'oxygen_level' => 90.0,
                'weight' => 67.0,
                'bp' => 182.0,
                'avg_body_temp' => 42.0,
                'avg_heart_beat' => 76.0,
                'glucose' => NULL,
                'created_at' => '2024-07-09 00:00:00',
                'updated_at' => '2024-07-09 00:00:00',
            ),
            27 => 
            array (
                'id' => 48,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 69.0,
                'oxygen_level' => 89.0,
                'weight' => 77.0,
                'bp' => 181.0,
                'avg_body_temp' => 43.0,
                'avg_heart_beat' => 77.0,
                'glucose' => NULL,
                'created_at' => '2024-07-10 00:00:00',
                'updated_at' => '2024-07-10 00:00:00',
            ),
            28 => 
            array (
                'id' => 49,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 70.0,
                'oxygen_level' => 88.0,
                'weight' => 55.0,
                'bp' => 180.0,
                'avg_body_temp' => 44.0,
                'avg_heart_beat' => 78.0,
                'glucose' => NULL,
                'created_at' => '2024-07-11 00:00:00',
                'updated_at' => '2024-07-11 00:00:00',
            ),
            29 => 
            array (
                'id' => 50,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 71.0,
                'oxygen_level' => 87.0,
                'weight' => 72.0,
                'bp' => 179.0,
                'avg_body_temp' => 45.0,
                'avg_heart_beat' => 79.0,
                'glucose' => NULL,
                'created_at' => '2024-07-12 00:00:00',
                'updated_at' => '2024-07-12 00:00:00',
            ),
            30 => 
            array (
                'id' => 51,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 72.0,
                'oxygen_level' => 86.0,
                'weight' => 88.0,
                'bp' => 178.0,
                'avg_body_temp' => 46.0,
                'avg_heart_beat' => 80.0,
                'glucose' => NULL,
                'created_at' => '2024-07-13 00:00:00',
                'updated_at' => '2024-07-13 00:00:00',
            ),
            31 => 
            array (
                'id' => 52,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 73.0,
                'oxygen_level' => 85.0,
                'weight' => 66.0,
                'bp' => 177.0,
                'avg_body_temp' => 47.0,
                'avg_heart_beat' => 81.0,
                'glucose' => NULL,
                'created_at' => '2024-07-14 00:00:00',
                'updated_at' => '2024-07-14 00:00:00',
            ),
            32 => 
            array (
                'id' => 53,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 74.0,
                'oxygen_level' => 84.0,
                'weight' => 77.0,
                'bp' => 146.0,
                'avg_body_temp' => 48.0,
                'avg_heart_beat' => 82.0,
                'glucose' => NULL,
                'created_at' => '2024-07-15 00:00:00',
                'updated_at' => '2024-07-15 00:00:00',
            ),
            33 => 
            array (
                'id' => 54,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 75.0,
                'oxygen_level' => 83.0,
                'weight' => 72.0,
                'bp' => 175.0,
                'avg_body_temp' => 49.0,
                'avg_heart_beat' => 83.0,
                'glucose' => NULL,
                'created_at' => '2024-07-16 00:00:00',
                'updated_at' => '2024-07-16 00:00:00',
            ),
            34 => 
            array (
                'id' => 55,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 76.0,
                'oxygen_level' => 82.0,
                'weight' => 72.0,
                'bp' => 174.0,
                'avg_body_temp' => 50.0,
                'avg_heart_beat' => 84.0,
                'glucose' => NULL,
                'created_at' => '2024-07-17 00:00:00',
                'updated_at' => '2024-07-17 00:00:00',
            ),
            35 => 
            array (
                'id' => 56,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 77.0,
                'oxygen_level' => 81.0,
                'weight' => 72.0,
                'bp' => 173.0,
                'avg_body_temp' => 51.0,
                'avg_heart_beat' => 85.0,
                'glucose' => NULL,
                'created_at' => '2024-07-18 00:00:00',
                'updated_at' => '2024-07-18 00:00:00',
            ),
            36 => 
            array (
                'id' => 57,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 78.0,
                'oxygen_level' => 80.0,
                'weight' => 72.0,
                'bp' => 152.0,
                'avg_body_temp' => 52.0,
                'avg_heart_beat' => 86.0,
                'glucose' => NULL,
                'created_at' => '2024-07-19 00:00:00',
                'updated_at' => '2024-07-19 00:00:00',
            ),
            37 => 
            array (
                'id' => 58,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 79.0,
                'oxygen_level' => 79.0,
                'weight' => 72.0,
                'bp' => 171.0,
                'avg_body_temp' => 53.0,
                'avg_heart_beat' => 87.0,
                'glucose' => NULL,
                'created_at' => '2024-07-20 00:00:00',
                'updated_at' => '2024-07-20 00:00:00',
            ),
            38 => 
            array (
                'id' => 59,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 80.0,
                'oxygen_level' => 78.0,
                'weight' => 72.0,
                'bp' => 170.0,
                'avg_body_temp' => 54.0,
                'avg_heart_beat' => 88.0,
                'glucose' => NULL,
                'created_at' => '2024-07-21 00:00:00',
                'updated_at' => '2024-07-21 00:00:00',
            ),
            39 => 
            array (
                'id' => 60,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 81.0,
                'oxygen_level' => 77.0,
                'weight' => 72.0,
                'bp' => 139.0,
                'avg_body_temp' => 55.0,
                'avg_heart_beat' => 89.0,
                'glucose' => NULL,
                'created_at' => '2024-07-22 00:00:00',
                'updated_at' => '2024-07-22 00:00:00',
            ),
            40 => 
            array (
                'id' => 61,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 82.0,
                'oxygen_level' => 76.0,
                'weight' => 72.0,
                'bp' => 168.0,
                'avg_body_temp' => 56.0,
                'avg_heart_beat' => 55.0,
                'glucose' => NULL,
                'created_at' => '2024-07-23 00:00:00',
                'updated_at' => '2024-07-23 00:00:00',
            ),
            41 => 
            array (
                'id' => 62,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 83.0,
                'oxygen_level' => 75.0,
                'weight' => 72.0,
                'bp' => 167.0,
                'avg_body_temp' => 57.0,
                'avg_heart_beat' => 91.0,
                'glucose' => NULL,
                'created_at' => '2024-07-24 00:00:00',
                'updated_at' => '2024-07-24 00:00:00',
            ),
            42 => 
            array (
                'id' => 63,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 84.0,
                'oxygen_level' => 74.0,
                'weight' => 72.0,
                'bp' => 166.0,
                'avg_body_temp' => 58.0,
                'avg_heart_beat' => 65.0,
                'glucose' => NULL,
                'created_at' => '2024-07-25 00:00:00',
                'updated_at' => '2024-07-25 00:00:00',
            ),
            43 => 
            array (
                'id' => 64,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 85.0,
                'oxygen_level' => 73.0,
                'weight' => 72.0,
                'bp' => 161.0,
                'avg_body_temp' => 59.0,
                'avg_heart_beat' => 67.0,
                'glucose' => NULL,
                'created_at' => '2024-07-26 00:00:00',
                'updated_at' => '2024-07-26 00:00:00',
            ),
            44 => 
            array (
                'id' => 65,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 86.0,
                'oxygen_level' => 72.0,
                'weight' => 72.0,
                'bp' => 164.0,
                'avg_body_temp' => 60.0,
                'avg_heart_beat' => 53.0,
                'glucose' => NULL,
                'created_at' => '2024-07-27 00:00:00',
                'updated_at' => '2024-07-27 00:00:00',
            ),
            45 => 
            array (
                'id' => 66,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 87.0,
                'oxygen_level' => 71.0,
                'weight' => 72.0,
                'bp' => 155.0,
                'avg_body_temp' => 61.0,
                'avg_heart_beat' => 95.0,
                'glucose' => NULL,
                'created_at' => '2024-07-28 00:00:00',
                'updated_at' => '2024-07-28 00:00:00',
            ),
            46 => 
            array (
                'id' => 67,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 88.0,
                'oxygen_level' => 70.0,
                'weight' => 72.0,
                'bp' => 132.0,
                'avg_body_temp' => 62.0,
                'avg_heart_beat' => 44.0,
                'glucose' => NULL,
                'created_at' => '2024-07-29 00:00:00',
                'updated_at' => '2024-07-29 00:00:00',
            ),
            47 => 
            array (
                'id' => 68,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 89.0,
                'oxygen_level' => 69.0,
                'weight' => 72.0,
                'bp' => 151.0,
                'avg_body_temp' => 63.0,
                'avg_heart_beat' => 66.0,
                'glucose' => NULL,
                'created_at' => '2024-07-30 00:00:00',
                'updated_at' => '2024-07-30 00:00:00',
            ),
            48 => 
            array (
                'id' => 69,
                'patient_id' => 7,
                'note' => 'No',
                'total_sleep_hr' => 6.0,
                'morning_breakfast' => 1,
                'afternoon_lunch' => 1,
                'night_dinner' => 1,
                'morning_medicine' => 1,
                'afternoon_medicine' => 1,
                'night_medicine' => 1,
                'pulse_rate' => 90.0,
                'oxygen_level' => 68.0,
                'weight' => 72.0,
                'bp' => 160.0,
                'avg_body_temp' => 64.0,
                'avg_heart_beat' => 55.0,
                'glucose' => NULL,
                'created_at' => '2024-07-31 00:00:00',
                'updated_at' => '2024-07-31 00:00:00',
            ),
        ));
        
        
    }
}