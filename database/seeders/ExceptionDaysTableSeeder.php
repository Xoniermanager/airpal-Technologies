<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExceptionDaysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('exception_days')->delete();
        
        \DB::table('exception_days')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 1,
                'exception_days_id' => 7,
                'status' => 1,
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            1 => 
            array (
                'id' => 2,
                'doctor_id' => 2,
                'exception_days_id' => 7,
                'status' => 1,
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            2 => 
            array (
                'id' => 3,
                'doctor_id' => 3,
                'exception_days_id' => 7,
                'status' => 1,
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            3 => 
            array (
                'id' => 4,
                'doctor_id' => 4,
                'exception_days_id' => 7,
                'status' => 1,
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            4 => 
            array (
                'id' => 5,
                'doctor_id' => 5,
                'exception_days_id' => 7,
                'status' => 1,
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
        ));
        
        
    }
}