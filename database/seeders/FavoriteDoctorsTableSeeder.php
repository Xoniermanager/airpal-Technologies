<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FavoriteDoctorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('favorite_doctors')->delete();
        
        \DB::table('favorite_doctors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 1,
                'patient_id' => 6,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:19',
                'updated_at' => '2024-08-02 05:42:19',
            ),
            1 => 
            array (
                'id' => 2,
                'doctor_id' => 3,
                'patient_id' => 6,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:30',
                'updated_at' => '2024-08-02 05:42:30',
            ),
            array (
                'id' => 3,
                'doctor_id' => 3,
                'patient_id' => 7,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:30',
                'updated_at' => '2024-08-02 05:42:30',
            ),
            array (
                'id' => 4,
                'doctor_id' => 2,
                'patient_id' => 7,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:30',
                'updated_at' => '2024-08-02 05:42:30',
            ),
            array (
                'id' => 5,
                'doctor_id' => 3,
                'patient_id' => 8,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:30',
                'updated_at' => '2024-08-02 05:42:30',
            ),
            array (
                'id' => 6,
                'doctor_id' => 2,
                'patient_id' => 8,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:30',
                'updated_at' => '2024-08-02 05:42:30',
            ),
            array (
                'id' => 7,
                'doctor_id' => 3,
                'patient_id' => 9,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:30',
                'updated_at' => '2024-08-02 05:42:30',
            ),
            array (
                'id' => 8,
                'doctor_id' => 2,
                'patient_id' => 9,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:30',
                'updated_at' => '2024-08-02 05:42:30',
            ),
        ));
        
        
    }
}