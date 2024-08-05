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
                'id' => 4,
                'doctor_id' => 1,
                'patient_id' => 6,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:19',
                'updated_at' => '2024-08-02 05:42:19',
            ),
            1 => 
            array (
                'id' => 5,
                'doctor_id' => 3,
                'patient_id' => 6,
                'status' => 1,
                'created_at' => '2024-08-02 05:42:30',
                'updated_at' => '2024-08-02 05:42:30',
            ),
        ));
        
        
    }
}