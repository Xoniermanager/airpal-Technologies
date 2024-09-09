<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Home',
                'meta_title' => 'Home page',
                'meta_description' => 'Doctor appointments bookings',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'About-us',
                'meta_title' => 'About-Us',
                'meta_description' => 'Airpal app is best for medication and booking appointments',
                'created_at' => '2024-09-08 11:25:07',
                'updated_at' => '2024-09-08 11:25:07',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Health Monitoring',
                'meta_title' => 'Health Monitoring',
                'meta_description' => 'Health Monitoring',
                'created_at' => '2024-09-08 20:16:18',
                'updated_at' => '2024-09-08 20:16:18',
            ),
        ));
        
        
    }
}