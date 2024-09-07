<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiteConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('site_configs')->delete();
        
        \DB::table('site_configs')->insert(array (
            0 => 
            array (
                'id' => 8,
                'name' => 'website_name',
                'value' => 'AirPal',
                'status' => 1,
                'created_at' => '2024-09-01 09:26:31',
                'updated_at' => '2024-09-02 06:01:30',
            ),
            1 => 
            array (
                'id' => 9,
                'name' => 'website_url',
                'value' => 'www.airpal.ai',
                'status' => 1,
                'created_at' => '2024-09-01 09:26:31',
                'updated_at' => '2024-09-01 09:26:31',
            ),
            2 => 
            array (
                'id' => 10,
                'name' => 'admin_email',
                'value' => 'airpal@gmail.com',
                'status' => 1,
                'created_at' => '2024-09-01 09:26:31',
                'updated_at' => '2024-09-02 06:01:30',
            ),
            3 => 
            array (
                'id' => 11,
                'name' => 'admin_phone',
                'value' => '1122334455',
                'status' => 1,
                'created_at' => '2024-09-01 09:26:31',
                'updated_at' => '2024-09-02 08:50:25',
            ),
            4 => 
            array (
                'id' => 12,
                'name' => 'website_logo',
                'value' => 'siteImages/website_logo-1725270197.png',
                'status' => 1,
                'created_at' => '2024-09-01 09:26:31',
                'updated_at' => '2024-09-02 09:43:17',
            ),
            5 => 
            array (
                'id' => 13,
                'name' => 'website_favicon',
                'value' => 'siteImages/website_logo-1725270197.png',
                'status' => 1,
                'created_at' => '2024-09-01 09:26:31',
                'updated_at' => '2024-09-02 09:43:17',
            ),
            6 => 
            array (
                'id' => 14,
                'name' => 'website_description',
                'value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled',
                'status' => 1,
                'created_at' => '2024-09-01 09:26:31',
                'updated_at' => '2024-09-02 08:52:29',
            ),
            7 => 
            array (
                'id' => 16,
                'name' => '',
                'value' => '',
                'status' => 1,
                'created_at' => '2024-09-02 05:47:57',
                'updated_at' => '2024-09-02 05:47:57',
            ),
            8 => 
            array (
                'id' => 17,
                'name' => 'copyright',
                'value' => '2020',
                'status' => 1,
                'created_at' => '2024-09-02 08:50:25',
                'updated_at' => '2024-09-02 12:49:08',
            ),
            9 => 
            array (
                'id' => 18,
                'name' => 'admin_address',
                'value' => 'Shipra suncity Indiarapuram Ghaziabad',
                'status' => 1,
                'created_at' => '2024-09-02 09:03:29',
                'updated_at' => '2024-09-02 09:03:29',
            ),
            10 => 
            array (
                'id' => 19,
                'name' => 'facebook_link',
                'value' => 'www.facebook.com',
                'status' => 1,
                'created_at' => '2024-09-02 12:41:07',
                'updated_at' => '2024-09-02 12:41:07',
            ),
            11 => 
            array (
                'id' => 20,
                'name' => 'instagram_link',
                'value' => 'www.instagram.com',
                'status' => 1,
                'created_at' => '2024-09-02 12:41:07',
                'updated_at' => '2024-09-02 12:41:07',
            ),
            12 => 
            array (
                'id' => 21,
                'name' => 'twitter_link',
                'value' => 'www.twitter.com',
                'status' => 1,
                'created_at' => '2024-09-02 12:41:07',
                'updated_at' => '2024-09-02 12:41:07',
            ),
            13 => 
            array (
                'id' => 22,
                'name' => 'linkedin_link',
                'value' => 'www.linked.com',
                'status' => 1,
                'created_at' => '2024-09-02 12:41:07',
                'updated_at' => '2024-09-02 12:41:07',
            ),
        ));
        
        
    }
}