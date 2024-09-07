<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('section_contents')->delete();
        
        \DB::table('section_contents')->insert(array (
            0 => 
            array (
                'id' => 97,
                'title' => 'Sign Up',
                'subtitle' => NULL,
                'image' => 'section-content/97-1725694595.svg',
                'content' => 'Create an account on our platform by providing some basic information such as your name, email address, and password. Rest assured that your information is kept confidential and secure.',
                'section_id' => 103,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-07 07:36:35',
            ),
            1 => 
            array (
                'id' => 98,
                'title' => 'doctor-profile-icon Describe Your Needs',
                'subtitle' => NULL,
                'image' => 'section-content/98-1725694595.svg',
                'content' => 'Tell us about your healthcare needs and concerns. Provide details about your symptoms, medical history, and any specific questions you have for the doctor.',
                'section_id' => 103,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-07 07:36:35',
            ),
            2 => 
            array (
                'id' => 99,
                'title' => 'Schedule Appointment',
                'subtitle' => NULL,
                'image' => 'section-content/99-1725694595.svg',
                'content' => 'Schedule Appointment
We offer flexible scheduling options, including same-day appointments and extended hours, to accommodate your busy schedule.',
                'section_id' => 103,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-07 07:36:35',
            ),
            3 => 
            array (
                'id' => 100,
                'title' => 'Connect and Consult',
                'subtitle' => NULL,
                'image' => 'section-content/100-1725694595.svg',
                'content' => 'At the scheduled time, log in to your account and connect with your doctor for the consultation. Our secure and user-friendly platform ensures a seamless experience.',
                'section_id' => 103,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-07 07:36:35',
            ),
            4 => 
            array (
                'id' => 101,
                'title' => 'Personalized Health care',
                'subtitle' => NULL,
                'image' => 'section-content/101-1725710715.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-07 12:05:15',
            ),
            5 => 
            array (
                'id' => 102,
                'title' => 'World-Leading Experts',
                'subtitle' => NULL,
                'image' => 'section-content/102-1725710715.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-07 12:05:15',
            ),
            6 => 
            array (
                'id' => 103,
                'title' => 'Regularly Check Up',
                'subtitle' => NULL,
                'image' => 'section-content/103-1725710715.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-07 12:05:15',
            ),
            7 => 
            array (
                'id' => 104,
                'title' => 'Treatment ForComplex Conditions',
                'subtitle' => NULL,
                'image' => 'section-content/104-1725710715.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-07 12:05:15',
            ),
            8 => 
            array (
                'id' => 105,
                'title' => 'Minimally Invasive Procedures',
                'subtitle' => NULL,
                'image' => 'section-content/105-1725710715.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-07 12:05:15',
            ),
        ));
        
        
    }
}