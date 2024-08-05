<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorExperiencesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_experiences')->delete();
        
        \DB::table('doctor_experiences')->insert(array (
            0 => 
            array (
                'id' => 1,
                'job_title' => 'Example Job Title',
                'hospital_id' => 1,
                'user_id' => 1,
                'location' => 'Example Location',
                'certificates' => 'Certification Name',
                'start_date' => '2020-01-01',
                'end_date' => '2021-12-31',
                'job_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'currently_working' => 0,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            1 => 
            array (
                'id' => 2,
                'job_title' => 'Example Job Title',
                'hospital_id' => 1,
                'user_id' => 2,
                'location' => 'Example Location',
                'certificates' => 'Certification Name',
                'start_date' => '2020-01-01',
                'end_date' => '2021-12-31',
                'job_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'currently_working' => 0,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            2 => 
            array (
                'id' => 3,
                'job_title' => 'Example Job Title',
                'hospital_id' => 1,
                'user_id' => 3,
                'location' => 'Example Location',
                'certificates' => 'Certification Name',
                'start_date' => '2020-01-01',
                'end_date' => '2021-12-31',
                'job_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'currently_working' => 0,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            3 => 
            array (
                'id' => 4,
                'job_title' => 'Example Job Title',
                'hospital_id' => 1,
                'user_id' => 4,
                'location' => 'Example Location',
                'certificates' => 'Certification Name',
                'start_date' => '2020-01-01',
                'end_date' => '2021-12-31',
                'job_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'currently_working' => 0,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            4 => 
            array (
                'id' => 5,
                'job_title' => 'Example Job Title',
                'hospital_id' => 1,
                'user_id' => 5,
                'location' => 'Example Location',
                'certificates' => 'Certification Name',
                'start_date' => '2020-01-01',
                'end_date' => '2021-12-31',
                'job_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'currently_working' => 0,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
        ));
        
        
    }
}