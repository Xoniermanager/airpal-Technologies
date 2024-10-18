<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialMediaTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_media_types')->delete();
        
        \DB::table('social_media_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Facebook',
                'status' => '1',
                'created_at' => '2024-10-08 17:15:31',
                'updated_at' => '2024-10-08 17:15:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Twitter',
                'status' => '1',
                'created_at' => '2024-10-08 17:15:38',
                'updated_at' => '2024-10-08 17:15:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Youtube',
                'status' => '1',
                'created_at' => '2024-10-08 17:15:49',
                'updated_at' => '2024-10-08 17:15:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Instagram',
                'status' => '1',
                'created_at' => '2024-10-08 17:17:53',
                'updated_at' => '2024-10-08 17:17:53',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Whatsapp',
                'status' => '1',
                'created_at' => '2024-10-08 17:18:43',
                'updated_at' => '2024-10-08 17:18:43',
            ),
        ));
        
        
    }
}