<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_items')->delete();
        
        \DB::table('list_items')->insert(array (
            0 => 
            array (
                'id' => 81,
                'title' => 'hello Real-time Monitoring: Track your vital signs, including heart rate, blood pressure, and oxygen levels, and more in real-time.',
                'status' => 1,
                'section_lists_id' => 53,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 16:24:40',
            ),
            1 => 
            array (
                'id' => 82,
                'title' => 'Alert System: Receive notifications for any unusual readings, allowing for prompt medical attention.',
                'status' => 1,
                'section_lists_id' => 53,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 05:18:04',
            ),
            2 => 
            array (
                'id' => 83,
                'title' => 'Data Insights: View your health data over time to identify trends and patterns.',
                'status' => 1,
                'section_lists_id' => 53,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 05:18:04',
            ),
            3 => 
            array (
                'id' => 84,
                'title' => 'Adipisicing culpa e',
                'status' => 1,
                'section_lists_id' => 53,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-11 13:33:55',
            ),
            4 => 
            array (
                'id' => 85,
                'title' => 'Interoperability: Our app connects with a wide range of wearable devices, giving you the flexibility to choose the one that best suits your needs.',
                'status' => 1,
                'section_lists_id' => 54,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 05:18:04',
            ),
            5 => 
            array (
                'id' => 86,
                'title' => 'Ease of Use: Our user-friendly interface makes it simple to monitor your health and track your progress.',
                'status' => 1,
                'section_lists_id' => 54,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 05:18:04',
            ),
            6 => 
            array (
                'id' => 87,
                'title' => 'Reliability: Our app is built with reliability in mind, ensuring that you can trust the data it provides.',
                'status' => 1,
                'section_lists_id' => 54,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 05:18:04',
            ),
            7 => 
            array (
                'id' => 88,
                'title' => 'Magnam ullam ullamco',
                'status' => 1,
                'section_lists_id' => 54,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-11 13:33:55',
            ),
            8 => 
            array (
                'id' => 89,
                'title' => 'Improved Patient-Doctor Communication: Wearables help break down barriers between doctors and patients, providing real-time data for better diagnosis and treatment.',
                'status' => 1,
                'section_lists_id' => 55,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 05:18:04',
            ),
            9 => 
            array (
                'id' => 90,
                'title' => '- Patient Engagement: Wearables encourage healthy lifestyles by tracking progress and sending reminders for exercise and medication.',
                'status' => 1,
                'section_lists_id' => 55,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 05:18:04',
            ),
            10 => 
            array (
                'id' => 91,
                'title' => 'Remote Monitoring: Wearables enable continuous monitoring of vital signs, allowing for timely intervention and improved patient outcomes.',
                'status' => 1,
                'section_lists_id' => 55,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 05:18:04',
            ),
            11 => 
            array (
                'id' => 92,
                'title' => 'Data Insights: Wearables provide valuable data for healthcare providers, enabling personalised treatment plans and improved patient care.',
                'status' => 1,
                'section_lists_id' => 55,
                'created_at' => '2024-09-11 13:33:55',
                'updated_at' => '2024-09-12 05:18:04',
            ),
        ));
        
        
    }
}