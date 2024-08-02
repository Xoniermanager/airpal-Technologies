<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorEducationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_education')->delete();
        
        \DB::table('doctor_education')->insert(array (
            0 => 
            array (
                'id' => 1,
                'institute_name' => 'Example Institute',
                'certificates' => 'Certification Name',
                'course_id' => 1,
                'user_id' => 1,
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-31',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-02 09:21:55',
            ),
            1 => 
            array (
                'id' => 2,
                'institute_name' => 'Example Institute',
                'certificates' => 'Certification Name',
                'course_id' => 8,
                'user_id' => 2,
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-31',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-02 09:19:30',
            ),
            2 => 
            array (
                'id' => 3,
                'institute_name' => 'Example Institute',
                'certificates' => 'Certification Name',
                'course_id' => 1,
                'user_id' => 3,
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-31',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-02 09:28:18',
            ),
            3 => 
            array (
                'id' => 4,
                'institute_name' => 'Example Institute',
                'certificates' => 'Certification Name',
                'course_id' => 1,
                'user_id' => 4,
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-31',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-01 11:16:01',
            ),
            4 => 
            array (
                'id' => 5,
                'institute_name' => 'Example Institute',
                'certificates' => 'Certification Name',
                'course_id' => 1,
                'user_id' => 5,
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-31',
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-08-02 09:29:33',
            ),
            5 => 
            array (
                'id' => 6,
                'institute_name' => 'Texas University',
                'certificates' => NULL,
                'course_id' => 10,
                'user_id' => 2,
                'start_date' => '2015-08-01',
                'end_date' => '2020-08-06',
                'created_at' => '2024-08-02 09:18:31',
                'updated_at' => '2024-08-02 09:19:30',
            ),
            6 => 
            array (
                'id' => 7,
                'institute_name' => 'Taxes University',
                'certificates' => NULL,
                'course_id' => 9,
                'user_id' => 2,
                'start_date' => '2020-08-01',
                'end_date' => '2021-08-01',
                'created_at' => '2024-08-02 09:19:30',
                'updated_at' => '2024-08-02 09:19:30',
            ),
            7 => 
            array (
                'id' => 8,
                'institute_name' => 'Fortis',
                'certificates' => NULL,
                'course_id' => 8,
                'user_id' => 1,
                'start_date' => '2015-08-01',
                'end_date' => '2020-08-01',
                'created_at' => '2024-08-02 09:21:55',
                'updated_at' => '2024-08-02 09:21:55',
            ),
            8 => 
            array (
                'id' => 9,
                'institute_name' => 'Amsterdam',
                'certificates' => NULL,
                'course_id' => 9,
                'user_id' => 3,
                'start_date' => '2010-08-01',
                'end_date' => '2015-08-07',
                'created_at' => '2024-08-02 09:28:18',
                'updated_at' => '2024-08-02 09:28:18',
            ),
            9 => 
            array (
                'id' => 10,
                'institute_name' => 'Amsterdam',
                'certificates' => NULL,
                'course_id' => 13,
                'user_id' => 5,
                'start_date' => '2012-08-03',
                'end_date' => '2017-08-04',
                'created_at' => '2024-08-02 09:29:33',
                'updated_at' => '2024-08-02 09:29:33',
            ),
        ));
        
        
    }
}