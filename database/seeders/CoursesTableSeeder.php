<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Medical Science',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dental Surgery',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pediatrics',
                'status' => 1,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-08-01 11:16:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Medical Science',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Dental Surgery',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Pediatrics',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'BPT',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'MBBS',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'MS',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'BDS',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'BPharm',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'MD',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'MPH',
                'status' => 1,
                'created_at' => '2024-08-02 09:17:00',
                'updated_at' => '2024-08-02 09:17:00',
            ),
        ));
        
        
    }
}