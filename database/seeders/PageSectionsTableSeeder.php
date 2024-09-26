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
                'image' => 'site-data/section-banner/home_banner-1727257394.png',
                'content' => '',
                'section_slug' => 'home_banner',
                'page_id' => 1,
                'status' => 1,
                'created_at' => '2024-09-07 07:26:56',
                'updated_at' => '2024-09-25 09:43:14',
            ),
            1 => 
            array (
                'id' => 103,
                'title' => '4 easy steps to get your solution d',
                'subtitle' => '',
                'image' => 'site-data/section-banner/how_it_works-1727257615.png',
                'content' => '',
                'section_slug' => 'how_it_works',
                'page_id' => 1,
                'status' => 1,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-25 09:46:55',
            ),
            2 => 
            array (
                'id' => 104,
                'title' => 'Why Airpal Technology',
                'subtitle' => '',
                'image' => NULL,
                'content' => '',
                'section_slug' => 'why_airpal_app',
                'page_id' => 1,
                'status' => 1,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-13 10:36:40',
            ),
            3 => 
            array (
                'id' => 105,
                'title' => 'Download the Airpal App today!',
                'subtitle' => 'Working for Your Better Health.',
                'image' => 'site-data/section-banner/download_app-1727257893.png',
                'content' => '',
                'section_slug' => 'download_app',
                'page_id' => 1,
                'status' => 1,
                'created_at' => '2024-09-07 13:00:48',
                'updated_at' => '2024-09-25 09:51:33',
            ),
            4 => 
            array (
                'id' => 106,
                'title' => 'binte dil',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'content' => NULL,
                'section_slug' => 'contact_with_us',
                'page_id' => 2,
                'status' => 1,
                'created_at' => '2024-09-08 11:12:36',
                'updated_at' => '2024-09-08 11:12:36',
            ),
            5 => 
            array (
                'id' => 107,
                'title' => 'binte dil',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'content' => NULL,
                'section_slug' => 'contact_with_us',
                'page_id' => 2,
                'status' => 1,
                'created_at' => '2024-09-08 11:20:31',
                'updated_at' => '2024-09-08 11:20:31',
            ),
            6 => 
            array (
                'id' => 108,
                'title' => 'binte dil',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'content' => NULL,
                'section_slug' => 'contact_with_us',
                'page_id' => 2,
                'status' => 1,
                'created_at' => '2024-09-08 11:21:14',
                'updated_at' => '2024-09-08 11:21:14',
            ),
            7 => 
            array (
                'id' => 109,
                'title' => 'binte dil hello',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'content' => NULL,
                'section_slug' => 'contact_with_us',
                'page_id' => 2,
                'status' => 1,
                'created_at' => '2024-09-08 11:22:22',
                'updated_at' => '2024-09-08 11:22:22',
            ),
            8 => 
            array (
                'id' => 110,
                'title' => 'binte dil hello',
                'subtitle' => 'Velit itaque et dolo',
                'image' => NULL,
                'content' => NULL,
                'section_slug' => 'contact_with_us',
                'page_id' => 2,
                'status' => 1,
                'created_at' => '2024-09-08 11:22:36',
                'updated_at' => '2024-09-08 11:22:36',
            ),
            9 => 
            array (
                'id' => 111,
                'title' => 'Be on Your Way to Feeling Better with the Telememdicien App',
                'subtitle' => 'Velit itaque et dolo',
                'image' => 'site-data/section-banner/contact_with_us-1727332352.png',
                'content' => '',
                'section_slug' => 'contact_with_us',
                'page_id' => 2,
                'status' => 1,
                'created_at' => '2024-09-08 11:23:05',
                'updated_at' => '2024-09-26 06:32:32',
            ),
            10 => 
            array (
                'id' => 112,
                'title' => 'Key Features',
                'subtitle' => '',
                'image' => NULL,
                'content' => '',
                'section_slug' => 'key_features',
                'page_id' => 2,
                'status' => 1,
                'created_at' => '2024-09-08 12:24:41',
                'updated_at' => '2024-09-26 06:30:26',
            ),
            11 => 
            array (
                'id' => 116,
                'title' => 'Patient Appointment and Management App',
                'subtitle' => '',
                'image' => 'site-data/section-banner/about_our_company-1727331999.png',
                'content' => 'Empowering individuals through innovative wearable tech, providing real-time health monitoring for improved wellness and efficient care. We envision a future where everyone has access to advanced healthcare solutions that use AI and biosensing wearables to proactively monitor health, predict potential issues, and provide personalised recommendations for optimal wellness and longevity.',
                'section_slug' => 'about_our_company',
                'page_id' => 2,
                'status' => 1,
                'created_at' => '2024-09-08 13:19:27',
                'updated_at' => '2024-09-26 06:26:39',
            ),
            12 => 
            array (
                'id' => 118,
                'title' => 'Wearable Medical Device & Health Monitoring Technology',
                'subtitle' => 'Experts opinion at your comfort Zone',
                'image' => 'site-data/section-banner/health_monitoring_banner-1727289589.png',
                'content' => '',
                'section_slug' => 'health_monitoring_banner',
                'page_id' => 3,
                'status' => 1,
                'created_at' => '2024-09-08 15:05:26',
                'updated_at' => '2024-09-25 18:39:49',
            ),
            13 => 
            array (
                'id' => 119,
                'title' => 'Health Monitoring Device',
                'subtitle' => '',
                'image' => 'site-data/section-banner/health_monitoring_device-1727266199.jpg',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.

Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,

when an unknown printer took a galley of type and scrambled',
                'section_slug' => 'health_monitoring_device',
                'page_id' => 3,
                'status' => 1,
                'created_at' => '2024-09-08 15:47:09',
                'updated_at' => '2024-09-25 12:09:59',
            ),
            14 => 
            array (
                'id' => 120,
                'title' => 'Our Health Monitoring Device',
                'subtitle' => 'More the quantity, higher the discount. Hurry, Buy Now!',
                'image' => 'site-data/section-banner/our_health_monitoring-1727266023.jpg',
                'content' => '',
                'section_slug' => 'our_health_monitoring',
                'page_id' => 3,
                'status' => 1,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-25 12:07:03',
            ),
            15 => 
            array (
                'id' => 121,
                'title' => 'How Are We Solving The problem?',
                'subtitle' => 'Product Solution',
                'image' => 'site-data/section-banner/we_are_solving-1727266356.png',
                'content' => '',
                'section_slug' => 'we_are_solving',
                'page_id' => 3,
                'status' => 1,
                'created_at' => '2024-09-08 16:58:38',
                'updated_at' => '2024-09-25 12:12:36',
            ),
            16 => 
            array (
                'id' => 122,
                'title' => 'Research',
                'subtitle' => '',
                'image' => 'site-data/section-banner/research-1727259002.jpg',
                'content' => '',
                'section_slug' => 'research',
                'page_id' => 1,
                'status' => 1,
                'created_at' => '2024-09-11 09:30:34',
                'updated_at' => '2024-09-25 10:10:02',
            ),
            17 => 
            array (
                'id' => 123,
                'title' => 'Connect Your Wearables with AirPal',
                'subtitle' => 'AirPal offers a comprehensive health monitoring solution that seamlessly integrates with your wearable devices.',
                'image' => NULL,
                'content' => 'Our software app connects with wearables to provide real-time monitoring of vital signs, ensuring timely detection of any irregularities.',
                'section_slug' => 'product_details',
                'page_id' => 3,
                'status' => 1,
                'created_at' => '2024-09-12 06:50:22',
                'updated_at' => '2024-09-13 04:40:22',
            ),
            18 => 
            array (
                'id' => 124,
                'title' => 'Find Doctor, For Instant Consultation',
                'subtitle' => '',
                'image' => 'site-data/section-banner/instant_banner-1727325256.png',
                'content' => '',
                'section_slug' => 'instant_banner',
                'page_id' => 4,
                'status' => 1,
                'created_at' => '2024-09-25 19:33:21',
                'updated_at' => '2024-09-26 04:34:16',
            ),
        ));
        
        
    }
}