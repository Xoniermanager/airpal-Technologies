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
                'image' => 'site-data/section-content/97-1727257615.svg',
                'content' => 'Create an account on our platform by providing some basic information such as your name, email address, and password. Rest assured that your information is kept confidential and secure.',
                'section_id' => 103,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-25 09:46:55',
            ),
            1 => 
            array (
                'id' => 98,
                'title' => 'doctor-profile-icon Describe Your Needs',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/98-1727257615.svg',
                'content' => 'Tell us about your healthcare needs and concerns. Provide details about your symptoms, medical history, and any specific questions you have for the doctor.',
                'section_id' => 103,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-25 09:46:55',
            ),
            2 => 
            array (
                'id' => 99,
                'title' => 'Schedule Appointment',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/99-1727257615.svg',
                'content' => 'Schedule Appointment
We offer flexible scheduling options, including same-day appointments and extended hours, to accommodate your busy schedule.',
                'section_id' => 103,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-25 09:46:55',
            ),
            3 => 
            array (
                'id' => 100,
                'title' => 'Connect and Consult',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/100-1727257615.svg',
                'content' => 'At the scheduled time, log in to your account and connect with your doctor for the consultation. Our secure and user-friendly platform ensures a seamless experience.',
                'section_id' => 103,
                'created_at' => '2024-09-07 07:33:58',
                'updated_at' => '2024-09-25 09:46:55',
            ),
            4 => 
            array (
                'id' => 101,
                'title' => 'Personalized Health care',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/101-1727257822.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-25 09:50:22',
            ),
            5 => 
            array (
                'id' => 102,
                'title' => 'World-Leading Experts',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/102-1727257822.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-25 09:50:22',
            ),
            6 => 
            array (
                'id' => 103,
                'title' => 'Regularly Check Up',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/103-1727257822.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-25 09:50:22',
            ),
            7 => 
            array (
                'id' => 104,
                'title' => 'Treatment ForComplex Conditions',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/104-1727257822.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-25 09:50:22',
            ),
            8 => 
            array (
                'id' => 105,
                'title' => 'Minimally Invasive Procedures',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/105-1727257822.svg',
                'content' => NULL,
                'section_id' => 104,
                'created_at' => '2024-09-07 11:47:45',
                'updated_at' => '2024-09-25 09:50:22',
            ),
            9 => 
            array (
                'id' => 106,
                'title' => 'Appointment Management',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/106-1725798845.png',
                'content' => 'Patients can schedule appointments with doctors and nurses conveniently through our platform, streamlining the healthcare access process.',
                'section_id' => 112,
                'created_at' => '2024-09-08 12:24:41',
                'updated_at' => '2024-09-08 12:34:05',
            ),
            10 => 
            array (
                'id' => 107,
                'title' => 'Multiple Provider Support',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/107-1725798845.png',
                'content' => 'Our platform facilitates communication and collaboration among multiple healthcare providers involved in a patient\'s care, ensuring holistic and coordinated treatment.',
                'section_id' => 112,
                'created_at' => '2024-09-08 12:24:41',
                'updated_at' => '2024-09-08 12:34:05',
            ),
            11 => 
            array (
                'id' => 108,
                'title' => 'Reminders and Notifications',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/108-1725798845.png',
                'content' => 'Patients receive timely reminders and notifications for upcoming appointments and medication schedules, enhancing treatment adherence and patient engagement.',
                'section_id' => 112,
                'created_at' => '2024-09-08 12:24:41',
                'updated_at' => '2024-09-08 12:34:05',
            ),
            12 => 
            array (
                'id' => 109,
                'title' => 'Patient Diary',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/109-1725798845.png',
                'content' => 'Our platform includes a patient diary feature, allowing users to track symptoms, record vital information, and monitor their health progress over time.s',
                'section_id' => 112,
                'created_at' => '2024-09-08 12:24:41',
                'updated_at' => '2024-09-08 12:47:03',
            ),
            13 => 
            array (
                'id' => 110,
                'title' => 'Airpal Portal',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/110-1725798845.png',
                'content' => 'We offer a Airpal portal for remote consultations, enabling patients to connect with healthcare providers virtually from the comfort of their homes.',
                'section_id' => 112,
                'created_at' => '2024-09-08 12:24:41',
                'updated_at' => '2024-09-08 12:34:05',
            ),
            14 => 
            array (
                'id' => 111,
                'title' => 'Bio-Sensor Integration',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/111-1725798845.png',
                'content' => 'We provide seamless integration with wearable bio-sensors, allowing patients to monitor their health metrics and transmit real-time data to healthcare providers for better-informed decision-making.',
                'section_id' => 112,
                'created_at' => '2024-09-08 12:24:41',
                'updated_at' => '2024-09-08 12:34:05',
            ),
            15 => 
            array (
                'id' => 112,
                'title' => 'Count Your Steps',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/112-1727265992.jpg',
                'content' => NULL,
                'section_id' => 120,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-25 12:06:32',
            ),
            16 => 
            array (
                'id' => 113,
                'title' => 'Check Your Heart Rate',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/113-1727265992.jpg',
                'content' => NULL,
                'section_id' => 120,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-25 12:06:32',
            ),
            17 => 
            array (
                'id' => 114,
                'title' => 'Sleep Tracking',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/114-1727265992.jpg',
                'content' => NULL,
                'section_id' => 120,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-25 12:06:32',
            ),
            18 => 
            array (
                'id' => 115,
                'title' => 'Body Temperature',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/115-1727265992.jpg',
                'content' => NULL,
                'section_id' => 120,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-25 12:06:32',
            ),
            19 => 
            array (
                'id' => 116,
                'title' => 'Check Your ECG',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/116-1727265992.jpg',
                'content' => NULL,
                'section_id' => 120,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-25 12:06:32',
            ),
            20 => 
            array (
                'id' => 117,
                'title' => 'Track Your BP Count',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/117-1727265992.jpg',
                'content' => NULL,
                'section_id' => 120,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-25 12:06:32',
            ),
            21 => 
            array (
                'id' => 118,
                'title' => 'Respiration Rate',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/118-1727265992.jpg',
                'content' => NULL,
                'section_id' => 120,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-25 12:06:32',
            ),
            22 => 
            array (
                'id' => 119,
                'title' => 'Physical Movement',
                'subtitle' => NULL,
                'image' => 'site-data/section-content/119-1727265992.jpg',
                'content' => NULL,
                'section_id' => 120,
                'created_at' => '2024-09-08 16:18:16',
                'updated_at' => '2024-09-25 12:06:32',
            ),
            23 => 
            array (
                'id' => 120,
                'title' => 'Monitors Users Health Remotely',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => NULL,
                'section_id' => 121,
                'created_at' => '2024-09-08 16:58:38',
                'updated_at' => '2024-09-08 16:58:38',
            ),
            24 => 
            array (
                'id' => 121,
                'title' => 'Connects Patients with Medical Staff',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => NULL,
                'section_id' => 121,
                'created_at' => '2024-09-08 16:58:38',
                'updated_at' => '2024-09-08 16:58:38',
            ),
            25 => 
            array (
                'id' => 122,
                'title' => 'Helps People with Mental Health Problems',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => NULL,
                'section_id' => 121,
                'created_at' => '2024-09-08 16:58:38',
                'updated_at' => '2024-09-08 16:58:38',
            ),
            26 => 
            array (
                'id' => 123,
                'title' => 'Calms people who have panic attacks',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => NULL,
                'section_id' => 121,
                'created_at' => '2024-09-08 16:58:38',
                'updated_at' => '2024-09-08 16:58:38',
            ),
            27 => 
            array (
                'id' => 124,
                'title' => 'Quality Mentoring benefits',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => NULL,
                'section_id' => 121,
                'created_at' => '2024-09-08 16:58:38',
                'updated_at' => '2024-09-08 16:58:38',
            ),
            28 => 
            array (
                'id' => 125,
                'title' => 'Limited Access to Healthcare in Rural Areas:',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => 'In Ireland, 68% of medical practices outside major cities are not accepting new patients, reflecting a significant urban-rural divide in healthcare access. This situation is compounded by the fact that 15% of Northern Ireland\'s population lives in the most rural wards, where only 13% of GP practices are located . Telemedicine can connect rural patients with healthcare providers, improving access to necessary services .',
                'section_id' => 122,
                'created_at' => '2024-09-11 09:39:14',
                'updated_at' => '2024-09-11 09:39:14',
            ),
            29 => 
            array (
                'id' => 126,
                'title' => 'Long Wait Times for Appointments:',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => 'The average wait time for a GP appointment in rural Ireland can reach up to two weeks, compared to same-day appointments available in urban areas . In Europe, patients in countries like Spain and Italy also experience long wait times, averaging 20-30 days for specialist consultations . Telemedicine can reduce these wait times by facilitating quicker consultations.',
                'section_id' => 122,
                'created_at' => '2024-09-11 09:39:14',
                'updated_at' => '2024-09-11 09:39:14',
            ),
            30 => 
            array (
                'id' => 127,
                'title' => 'Lack of Specialized Care in Certain Regions:',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => 'Over 65 million Europeans live in areas with a shortage of healthcare providers, particularly specialists . Telemedicine enables patients to access specialized care without the need to travel long distances, addressing this disparity effectively.',
                'section_id' => 122,
                'created_at' => '2024-09-11 09:39:14',
                'updated_at' => '2024-09-11 09:39:14',
            ),
            31 => 
            array (
                'id' => 204,
                'title' => 'Get Started',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => 'Download our app today and start monitoring your health with ease.',
                'section_id' => 123,
                'created_at' => '2024-09-12 10:37:52',
                'updated_at' => '2024-09-12 10:37:52',
            ),
            32 => 
            array (
                'id' => 205,
                'title' => 'Learn More',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => 'For more information on our wearable health monitoring solution, please visit our Contact Us page.',
                'section_id' => 123,
                'created_at' => '2024-09-12 10:37:52',
                'updated_at' => '2024-09-12 10:37:52',
            ),
            33 => 
            array (
                'id' => 206,
                'title' => 'Contact Your Doctor',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => 'Need medical advice or have questions about your health? Contact your doctor through our telemedicine app for personalized guidance and support.',
                'section_id' => 123,
                'created_at' => '2024-09-12 10:37:52',
                'updated_at' => '2024-09-12 10:37:52',
            ),
            34 => 
            array (
                'id' => 207,
                'title' => 'Connect Now',
                'subtitle' => NULL,
                'image' => NULL,
                'content' => 'Don\'t wait to take control of your health. Subscribe to our wearable health monitoring device today and start monitoring your vital signs with ease.',
                'section_id' => 123,
                'created_at' => '2024-09-12 10:37:52',
                'updated_at' => '2024-09-12 10:37:52',
            ),
        ));
        
        
    }
}