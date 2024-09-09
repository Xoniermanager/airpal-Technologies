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
            4 => 
            array (
                'id' => 106,
                'title' => 'binte dil',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'section_slug' => 'contact_with_us',
                'status' => 1,
                'page_id' => 2,
                'created_at' => '2024-09-08 11:12:36',
                'updated_at' => '2024-09-08 11:12:36',
            ),
            5 => 
            array (
                'id' => 107,
                'title' => 'binte dil',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'section_slug' => 'contact_with_us',
                'status' => 1,
                'page_id' => 2,
                'created_at' => '2024-09-08 11:20:31',
                'updated_at' => '2024-09-08 11:20:31',
            ),
            6 => 
            array (
                'id' => 108,
                'title' => 'binte dil',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'section_slug' => 'contact_with_us',
                'status' => 1,
                'page_id' => 2,
                'created_at' => '2024-09-08 11:21:14',
                'updated_at' => '2024-09-08 11:21:14',
            ),
            7 => 
            array (
                'id' => 109,
                'title' => 'binte dil hello',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'section_slug' => 'contact_with_us',
                'status' => 1,
                'page_id' => 2,
                'created_at' => '2024-09-08 11:22:22',
                'updated_at' => '2024-09-08 11:22:22',
            ),
            8 => 
            array (
                'id' => 110,
                'title' => 'binte dil hello',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'section_slug' => 'contact_with_us',
                'status' => 1,
                'page_id' => 2,
                'created_at' => '2024-09-08 11:22:36',
                'updated_at' => '2024-09-08 11:22:36',
            ),
            9 => 
            array (
                'id' => 111,
                'title' => 'binte dil hello hllo aga',
                'subtitle' => 'Velit itaque et dolo',
                'image' => 'section-banner/contact_with_us-1725796622.png',
                'section_slug' => 'contact_with_us',
                'status' => 1,
                'page_id' => 2,
                'created_at' => '2024-09-08 11:23:05',
                'updated_at' => '2024-09-08 11:57:02',
            ),
            10 => 
            array (
                'id' => 112,
                'title' => 'Key Features',
                'subtitle' => '',
                'image' => NULL,
                'section_slug' => 'key_features',
                'status' => 1,
                'page_id' => 2,
                'created_at' => '2024-09-08 12:24:41',
                'updated_at' => '2024-09-08 12:24:41',
            ),
            11 => 
            array (
                'id' => 116,
                'title' => 'Patient Appointment and Management App',
                'subtitle' => 'Empowering individuals through innovative wearable tech, providing real-time health monitoring for improved wellness and efficient care.  We envision a future where everyone has access to advanced healthcare solutions that use AI and biosensing wearables to proactively monitor health, predict potential issues, and provide personalised recommendations for optimal wellness and longevity.',
                'image' => 'section-banner/about_our_company-1725801801.png',
                'section_slug' => 'about_our_company',
                'status' => 1,
                'page_id' => 2,
                'created_at' => '2024-09-08 13:19:27',
                'updated_at' => '2024-09-08 14:34:49',
            ),
            12 => 
            array (
                'id' => 118,
                'title' => 'Wearable Medical Device & Health Monitoring Technology',
                'subtitle' => 'Experts opinion at your comfort Zone',
                'image' => 'section-banner/health_monitoring-1725808196.png',
                'section_slug' => 'health_monitoring_banner',
                'status' => 1,
                'page_id' => 3,
                'created_at' => '2024-09-08 15:05:26',
                'updated_at' => '2024-09-08 15:09:56',
            ),
            13 => 
            array (
                'id' => 119,
                'title' => 'Health Monitoring Device',
                'subtitle' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. <p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled  Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>',
                'image' => 'section-banner/health_monitoring_device-1725815787.jpg',
                'section_slug' => 'health_monitoring_device',
                'status' => 1,
                'page_id' => 3,
                'created_at' => '2024-09-08 15:47:09',
                'updated_at' => '2024-09-08 17:16:27',
            ),
            14 => 
            array (
                'id' => 120,
                'title' => 'Our Health Monitoring Device',
                'subtitle' => '',
                'image' => 'section-banner/our_health_monitoring-1725812377.jpg',
                'section_slug' => 'our_health_monitoring',
                'status' => 1,
                'page_id' => 3,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-08 16:19:37',
            ),
            15 => 
            array (
                'id' => 121,
                'title' => 'How Are We Solving The problem?',
                'subtitle' => '',
                'image' => 'section-banner/we_are_solving-1725816222.png',
                'section_slug' => 'we_are_solving',
                'status' => 1,
                'page_id' => 3,
                'created_at' => '2024-09-08 16:58:38',
                'updated_at' => '2024-09-08 17:23:42',
            ),
        ));
        
        
    }
}