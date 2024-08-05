<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_services')->delete();
        
        \DB::table('doctor_services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'service_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'service_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'service_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'service_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'service_id' => 1,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
        ));
        
        
    }
}