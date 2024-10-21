<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorSocialMediaAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_social_media_accounts')->delete();
        
        \DB::table('doctor_social_media_accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 2,
                'social_media_type_id' => '1',
                'link' => 'https://www.gorivofynesa.com',
                'status' => 1,
                'created_at' => '2024-10-21 11:55:00',
                'updated_at' => '2024-10-21 11:55:00',
            ),
            1 => 
            array (
                'id' => 2,
                'doctor_id' => 2,
                'social_media_type_id' => '2',
                'link' => 'https://www.febytisakyxibam.tv',
                'status' => 1,
                'created_at' => '2024-10-21 11:55:00',
                'updated_at' => '2024-10-21 11:55:00',
            ),
        ));
        
        
    }
}