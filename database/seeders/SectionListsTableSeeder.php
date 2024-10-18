<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionListsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('section_lists')->delete();
        
        \DB::table('section_lists')->insert(array (
            0 => 
            array (
                'id' => 53,
                'title' => 'Key Features',
                'icon' => 'Ut eaque omnis et ob',
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-10-18 10:04:00',
            ),
            1 => 
            array (
                'id' => 54,
                'title' => 'Why Choose AirPal?',
                'icon' => 'Soluta fuga Sit ev',
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-11 13:49:49',
            ),
            2 => 
            array (
                'id' => 55,
                'title' => 'Benefits of Wearable Integration',
                'icon' => 'Cupiditate ex ex sit 3',
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-11 13:49:49',
            ),
        ));
        
        
    }
}