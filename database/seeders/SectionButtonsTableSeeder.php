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
                'link' => '/search-doctor',
                'section_id' => 102,
                'status' => 1,
                'created_at' => '2024-09-07 07:26:56',
                'updated_at' => '2024-09-26 08:49:39',
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
                'link' => '/contact',
                'section_id' => 111,
                'status' => 1,
                'created_at' => '2024-09-08 11:23:05',
                'updated_at' => '2024-10-18 10:25:33',
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
                'id' => 36,
                'text' => 'Telemedicine App',
                'link' => 'http://127.0.0.1:8000/search-doctor',
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-12 06:50:22',
                'updated_at' => '2024-09-13 04:22:50',
            ),
            14 => 
            array (
                'id' => 38,
                'text' => NULL,
                'link' => 'https://www.apple.com/in/app-store/',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-09-25 09:51:33',
                'updated_at' => '2024-09-25 09:51:33',
            ),
            15 => 
            array (
                'id' => 39,
                'text' => NULL,
                'link' => NULL,
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-26 11:29:26',
                'updated_at' => '2024-09-26 11:29:26',
            ),
            16 => 
            array (
                'id' => 40,
                'text' => NULL,
                'link' => NULL,
                'section_id' => 123,
                'status' => 1,
                'created_at' => '2024-09-26 11:29:26',
                'updated_at' => '2024-09-26 11:29:26',
            ),
            17 => 
            array (
                'id' => 41,
                'text' => NULL,
                'link' => 'https://www.apple.com/in/app-store/',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-09-26 15:47:46',
                'updated_at' => '2024-09-26 15:47:46',
            ),
            18 => 
            array (
                'id' => 42,
                'text' => NULL,
                'link' => 'https://www.apple.com/in/app-store/',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-09-26 15:47:53',
                'updated_at' => '2024-09-26 15:47:53',
            ),
            19 => 
            array (
                'id' => 43,
                'text' => NULL,
                'link' => 'https://www.apple.com/in/app-store/',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-09-26 15:47:58',
                'updated_at' => '2024-09-26 15:47:58',
            ),
            20 => 
            array (
                'id' => 44,
                'text' => NULL,
                'link' => 'https://www.apple.com/in/app-store/',
                'section_id' => 105,
                'status' => 1,
                'created_at' => '2024-10-18 07:38:38',
                'updated_at' => '2024-10-18 07:38:38',
            ),
        ));
        
        
    }
}