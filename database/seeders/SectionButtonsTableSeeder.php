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
                'updated_at' => '2024-09-09 10:20:00',
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
            3 => 
            array (
                'id' => 22,
                'text' => 'Ad quasi est qui dol',
                'link' => 'Nihil suscipit offic',
                'section_id' => 106,
                'status' => 1,
                'created_at' => '2024-09-08 11:12:36',
                'updated_at' => '2024-09-08 11:12:36',
            ),
            4 => 
            array (
                'id' => 25,
                'text' => 'Contact With Us',
                'link' => 'https://play.google.com/store/games',
                'section_id' => 111,
                'status' => 1,
                'created_at' => '2024-09-08 11:23:05',
                'updated_at' => '2024-09-09 05:47:11',
            ),
            5 => 
            array (
                'id' => 26,
                'text' => '+1 1234567890',
                'link' => '1234567890',
                'section_id' => 116,
                'status' => 1,
                'created_at' => '2024-09-08 13:19:27',
                'updated_at' => '2024-09-08 14:37:47',
            ),
            6 => 
            array (
                'id' => 28,
                'text' => 'Book Now',
                'link' => 'http://127.0.0.1:8000/search-doctor',
                'section_id' => 118,
                'status' => 1,
                'created_at' => '2024-09-08 15:05:26',
                'updated_at' => '2024-09-08 15:41:59',
            ),
            7 => 
            array (
                'id' => 29,
                'text' => 'Order Now',
                'link' => 'http://127.0.0.1:8000',
                'section_id' => 119,
                'status' => 1,
                'created_at' => '2024-09-08 15:47:09',
                'updated_at' => '2024-09-08 15:57:46',
            ),
            8 => 
            array (
                'id' => 30,
                'text' => NULL,
                'link' => 'https://www.apple.com/in/app-store/',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-09-09 10:24:33',
                'updated_at' => '2024-09-09 10:24:33',
            ),
            9 => 
            array (
                'id' => 31,
                'text' => NULL,
                'link' => 'https://www.apple.com/in/app-store/',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-09-09 10:24:36',
                'updated_at' => '2024-09-09 10:24:36',
            ),
            10 => 
            array (
                'id' => 32,
                'text' => NULL,
                'link' => 'https://www.apple.com/in/app-store/',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-09-09 10:24:46',
                'updated_at' => '2024-09-09 10:24:46',
            ),
            11 => 
            array (
                'id' => 33,
                'text' => 'read all',
                'link' => 'http://127.0.0.1:8000',
                'section_id' => 122,
                'status' => 1,
                'created_at' => '2024-09-11 09:30:34',
                'updated_at' => '2024-09-11 09:30:34',
            ),
            12 => 
            array (
                'id' => 34,
                'text' => 'Download App',
                'link' => 'http://127.0.0.1:8000/search-doctor',
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-12 06:50:22',
                'updated_at' => '2024-09-13 04:23:50',
            ),
            13 => 
            array (
                'id' => 35,
                'text' => NULL,
                'link' => NULL,
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-12 06:50:22',
                'updated_at' => '2024-09-13 04:27:38',
            ),
            14 => 
            array (
                'id' => 36,
                'text' => 'Telemedicine App',
                'link' => 'http://127.0.0.1:8000/search-doctor',
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-12 06:50:22',
                'updated_at' => '2024-09-13 04:22:50',
            ),
            15 => 
            array (
                'id' => 37,
                'text' => NULL,
                'link' => NULL,
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-12 06:50:22',
                'updated_at' => '2024-09-13 04:28:02',
            ),
        ));
        
        
    }
}