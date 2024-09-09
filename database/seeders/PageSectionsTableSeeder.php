<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('page_sections')->delete();
        
        \DB::table('page_sections')->insert(array (
            0 => 
            array (
                'id' => 102,
                'title' => 'Consult <span>Best Doctors</span> Your Nearby Location.',
                'subtitle' => 'Experts opinion at your comfort Zone',
                'image' => 'section-banner/home_banner-1725696660.png',
                'section_slug' => 'home_banner',
                'status' => 1,
                'page_id' => 1,
                'created_at' => '2024-09-07 07:26:56',
                'updated_at' => '2024-09-07 08:11:00',
            ),
            1 => 
            array (
                'id' => 103,
                'title' => '4 easy steps to get your solution',
                'subtitle' => '',
                'image' => 'section-banner/how_it_works-1725697731.png',
                'section_slug' => 'how_it_works',
                'status' => 1,
                'page_id' => 1,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-07 08:28:51',
            ),
            2 => 
            array (
                'id' => 104,
                'title' => 'Why Airpal Technology',
                'subtitle' => '',
                'image' => NULL,
                'section_slug' => 'why_airpal_app',
                'status' => 1,
                'page_id' => 1,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-07 12:07:50',
            ),
            3 => 
            array (
                'id' => 105,
                'title' => 'Download the Airpal App today!',
                'subtitle' => 'Working for Your Better Health.',
                'image' => 'section-banner/download_app-1725714215.png',
                'section_slug' => 'download_app',
                'status' => 1,
                'page_id' => 1,
                'created_at' => '2024-09-07 13:00:48',
                'updated_at' => '2024-09-07 13:03:35',
            ),
        ));
        
        
    }
}