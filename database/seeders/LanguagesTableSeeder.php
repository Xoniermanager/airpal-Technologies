<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('languages')->delete();
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Hindi',
                'status' => 1,
                'created_at' => '2024-05-24 04:29:40',
                'updated_at' => '2024-05-24 04:29:40',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'English',
                'status' => 1,
                'created_at' => '2024-05-24 04:30:02',
                'updated_at' => '2024-05-24 04:30:02',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Urdu',
                'status' => 1,
                'created_at' => '2024-05-24 04:30:30',
                'updated_at' => '2024-05-24 04:30:30',
            ),
        ));
        
        
    }
}