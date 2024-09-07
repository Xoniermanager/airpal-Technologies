<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionButtonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('section_buttons')->delete();
        
        \DB::table('section_buttons')->insert(array (
            0 => 
            array (
                'id' => 19,
                'text' => 'Start a Consult',
                'link' => 'www.airpal.ai',
                'section_id' => 102,
                'status' => 1,
                'created_at' => '2024-09-07 07:26:56',
                'updated_at' => '2024-09-07 07:32:11',
            ),
            1 => 
            array (
                'id' => 20,
                'text' => NULL,
                'link' => 'https://play.google.com/store/games',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-09-07 13:00:48',
                'updated_at' => '2024-09-07 13:20:22',
            ),
            2 => 
            array (
                'id' => 21,
                'text' => NULL,
                'link' => 'https://www.apple.com/in/app-store/',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-09-07 13:20:22',
                'updated_at' => '2024-09-07 13:20:22',
            ),
        ));
        
        
    }
}