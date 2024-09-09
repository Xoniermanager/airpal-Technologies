<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faqs')->delete();
        
        \DB::table('faqs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'What is Airpal?',
                'description' => 'Airpal is a remote patient monitoring app that connects doctors with patients through a telemedicine platform. It integrates with wearable devices to monitor health parameters and acts as a personal health companion, reminding patients to take their medication and providing access to a wide range of doctors and booking calendars.',
                'created_at' => '2024-09-07 10:45:01',
                'updated_at' => '2024-09-07 10:45:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'How does Airpal works?',
                'description' => 'Airpal works by connecting patients with doctors through a secure telemedicine platform. Patients can monitor their health using connected wearable devices, receive reminders for their medications, and schedule appointments with various healthcare professionals through the app.',
                'created_at' => '2024-09-07 10:45:50',
                'updated_at' => '2024-09-07 10:46:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Who can use Airpal',
                'description' => 'Airpal is designed for anyone who needs remote medical monitoring and access to healthcare services. It is especially beneficial for patients with chronic conditions, those who require regular monitoring, and anyone who prefers the convenience of telemedicine.',
                'created_at' => '2024-09-07 10:46:11',
                'updated_at' => '2024-09-07 10:46:11',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'How do I get started with Airpal?',
                'description' => 'To get started, download the Airpal app from the App Store or Google Play, create an account, and follow the on-screen instructions to connect your wearable devices and complete your health profile.',
                'created_at' => '2024-09-07 10:46:41',
                'updated_at' => '2024-09-07 10:46:41',
            ),
        ));
        
        
    }
}