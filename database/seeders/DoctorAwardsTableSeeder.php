<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorAwardsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_awards')->delete();
        
        \DB::table('doctor_awards')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'award_id' => 1,
                'certificates' => 'Award Certificate',
                'year' => '2022-01-01',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'award_id' => 1,
                'certificates' => 'Award Certificate',
                'year' => '2022-01-01',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'award_id' => 1,
                'certificates' => 'Award Certificate',
                'year' => '2022-01-01',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'award_id' => 1,
                'certificates' => 'Award Certificate',
                'year' => '2022-01-01',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'award_id' => 1,
                'certificates' => 'Award Certificate',
                'year' => '2022-01-01',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
        ));
        
        
    }
}