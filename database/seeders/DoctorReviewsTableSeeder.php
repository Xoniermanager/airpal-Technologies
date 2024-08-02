<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorReviewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_reviews')->delete();
        
        \DB::table('doctor_reviews')->insert(array (
            0 => 
            array (
                'id' => 1,
                'patient_id' => 6,
                'doctor_id' => 1,
                'title' => 'Good',
                'rating' => 5.0,
                'review' => 'Dr. John is incredibly knowledgeable and attentive. He took the time to listen to my concerns and provided a thorough examination. His friendly demeanor made me feel at ease. I highly recommend him to anyone seeking a reliable family doctor.',
                'created_at' => '2024-08-01 12:13:49',
                'updated_at' => '2024-08-02 05:41:54',
            ),
            1 => 
            array (
                'id' => 2,
                'patient_id' => 8,
                'doctor_id' => 2,
                'title' => 'Best',
                'rating' => 1.0,
                'review' => 'I had to wait for over an hour past my appointment time to see Dr. Jane. When I finally saw her, she seemed rushed and didn’t address all my concerns. I felt like just another number.',
                'created_at' => '2024-08-01 12:15:05',
                'updated_at' => '2024-08-01 12:15:05',
            ),
            2 => 
            array (
                'id' => 3,
                'patient_id' => 6,
                'doctor_id' => 3,
                'title' => 'Good in Nature',
                'rating' => 4.0,
                'review' => 'Dr. Eva is fantastic with kids! My son usually hates doctor visits, but she felt comfortable and even smiled during the check-up. Dr. Eva’s patience and understanding make her an excellent pediatrician.',
                'created_at' => '2024-08-01 12:17:47',
                'updated_at' => '2024-08-02 05:48:31',
            ),
            3 => 
            array (
                'id' => 4,
                'patient_id' => 7,
                'doctor_id' => 4,
                'title' => 'Excellent Dentist',
                'rating' => 3.0,
                'review' => 'Highly knowledgeable and attentive. Great experience!',
                'created_at' => '2024-08-01 12:21:28',
                'updated_at' => '2024-08-01 12:21:28',
            ),
            4 => 
            array (
                'id' => 5,
                'patient_id' => 7,
                'doctor_id' => 5,
                'title' => 'Outstanding Dermatologist',
                'rating' => 3.0,
                'review' => 'Professional and kind. My skin has never looked better!',
                'created_at' => '2024-08-01 12:22:53',
                'updated_at' => '2024-08-01 12:22:53',
            ),
            5 => 
            array (
                'id' => 6,
                'patient_id' => 9,
                'doctor_id' => 1,
                'title' => 'Excellent',
                'rating' => 3.0,
                'review' => 'Very patient and detailed in his diagnosis.',
                'created_at' => '2024-08-01 13:00:47',
                'updated_at' => '2024-08-01 13:00:47',
            ),
            6 => 
            array (
                'id' => 7,
                'patient_id' => 6,
                'doctor_id' => 2,
                'title' => 'testing',
                'rating' => 2.0,
                'review' => 'I wasn’t impressed with Dr. Jane. She seemed distracted and didn’t interact well with my child. The consultation felt very impersonal.',
                'created_at' => '2024-08-02 05:41:08',
                'updated_at' => '2024-08-02 05:41:08',
            ),
            7 => 
            array (
                'id' => 8,
                'patient_id' => 8,
                'doctor_id' => 3,
                'title' => 'Great',
                'rating' => 3.0,
                'review' => '"Great experience with Dr. Eva. She took the time to explain everything clearly."',
                'created_at' => '2024-08-02 06:11:21',
                'updated_at' => '2024-08-02 06:11:21',
            ),
            8 => 
            array (
                'id' => 9,
                'patient_id' => 8,
                'doctor_id' => 4,
                'title' => 'Fantastic',
                'rating' => 3.0,
                'review' => 'Dr. Paul was very knowledgeable and addressed all my questions. Wonderful service!',
                'created_at' => '2024-08-02 06:14:03',
                'updated_at' => '2024-08-02 06:14:03',
            ),
            9 => 
            array (
                'id' => 10,
                'patient_id' => 11,
                'doctor_id' => 2,
                'title' => 'Appreciable',
                'rating' => 3.0,
                'review' => 'I appreciate Dr. Jane for his patience and understanding. Great bedside manner.',
                'created_at' => '2024-08-02 06:17:30',
                'updated_at' => '2024-08-02 06:17:30',
            ),
            10 => 
            array (
                'id' => 11,
                'patient_id' => 11,
                'doctor_id' => 1,
                'title' => 'Great Job',
                'rating' => 3.0,
                'review' => 'Dr. John kindness and expertise were evident throughout my visit. Very satisfied with the care',
                'created_at' => '2024-08-02 06:18:27',
                'updated_at' => '2024-08-02 06:18:27',
            ),
            11 => 
            array (
                'id' => 12,
                'patient_id' => 11,
                'doctor_id' => 4,
                'title' => 'Professional',
                'rating' => 3.0,
                'review' => 'Excellent experience with Dr. Paul. She was prompt, professional, and very friendly.',
                'created_at' => '2024-08-02 06:19:15',
                'updated_at' => '2024-08-02 06:19:15',
            ),
            12 => 
            array (
                'id' => 13,
                'patient_id' => 7,
                'doctor_id' => 1,
                'title' => 'Positive Man',
                'rating' => 3.0,
                'review' => 'Your thoroughness and dedication to understanding my health concerns were truly appreciated.',
                'created_at' => '2024-08-02 06:47:06',
                'updated_at' => '2024-08-02 06:47:06',
            ),
            13 => 
            array (
                'id' => 14,
                'patient_id' => 7,
                'doctor_id' => 2,
                'title' => 'Rude behaviour',
                'rating' => 3.0,
                'review' => 'Dr. Jane wasn’t a good fit for me. She seemed uninterested in my issues and quick to prescribe medication without exploring other options. I didn’t feel understood',
                'created_at' => '2024-08-02 06:50:25',
                'updated_at' => '2024-08-02 06:50:25',
            ),
            14 => 
            array (
                'id' => 15,
                'patient_id' => 7,
                'doctor_id' => 3,
                'title' => 'Highly Recommended Specialist',
                'rating' => 3.0,
                'review' => 'Dr.Eva resolved my chronic sinus issues with a precise and effective treatment plan.Good one',
                'created_at' => '2024-08-02 06:52:13',
                'updated_at' => '2024-08-02 06:52:13',
            ),
            15 => 
            array (
                'id' => 16,
                'patient_id' => 9,
                'doctor_id' => 5,
                'title' => 'Outstanding Medical Professional',
                'rating' => 3.0,
                'review' => 'Very skilled and made me feel at ease throughout the appointment.',
                'created_at' => '2024-08-02 06:53:30',
                'updated_at' => '2024-08-02 06:53:30',
            ),
            16 => 
            array (
                'id' => 17,
                'patient_id' => 9,
                'doctor_id' => 2,
                'title' => 'Professional and Empathetic',
                'rating' => 3.0,
                'review' => 'I appreciate Dr. Jane for his patience and understanding. Great bedside manner.',
                'created_at' => '2024-08-02 06:54:12',
                'updated_at' => '2024-08-02 06:54:12',
            ),
            17 => 
            array (
                'id' => 18,
                'patient_id' => 9,
                'doctor_id' => 3,
                'title' => 'Unpleasant Experience',
                'rating' => 1.0,
                'review' => 'The doctor seemed very disinterested in my issues. They barely looked at me during the appointment and rushed through the consultation. I felt like they didn’t care about my health concerns at all.',
                'created_at' => '2024-08-02 07:02:12',
                'updated_at' => '2024-08-02 07:02:12',
            ),
            18 => 
            array (
                'id' => 19,
                'patient_id' => 9,
                'doctor_id' => 4,
                'title' => 'Lack of Professionalism',
                'rating' => 3.0,
                'review' => 'The doctor was very dismissive of my concerns and didn’t take the time to explain the treatment options. The prescription they gave me caused more problems than it solved. I had to seek help elsewhere to fix it.',
                'created_at' => '2024-08-02 07:04:17',
                'updated_at' => '2024-08-02 07:04:17',
            ),
            19 => 
            array (
                'id' => 20,
                'patient_id' => 16,
                'doctor_id' => 1,
                'title' => 'Subpar Medical Service',
                'rating' => 1.0,
                'review' => 'The treatment they suggested was ineffective, and I felt like my concerns were dismissed.',
                'created_at' => '2024-08-02 07:53:38',
                'updated_at' => '2024-08-02 07:54:07',
            ),
            20 => 
            array (
                'id' => 21,
                'patient_id' => 16,
                'doctor_id' => 2,
                'title' => 'Not Recommended',
                'rating' => 1.0,
                'review' => 'They prescribed medication without exploring other treatment options and didn’t seem to understand my concerns.',
                'created_at' => '2024-08-02 07:54:45',
                'updated_at' => '2024-08-02 07:55:10',
            ),
            21 => 
            array (
                'id' => 22,
                'patient_id' => 16,
                'doctor_id' => 3,
                'title' => 'Disappointing Experience',
                'rating' => 3.0,
                'review' => 'The procedure was painful, and I felt like they didn’t care about my comfort. I left the office in more pain than I arrived.',
                'created_at' => '2024-08-02 07:55:59',
                'updated_at' => '2024-08-02 07:55:59',
            ),
            22 => 
            array (
                'id' => 23,
                'patient_id' => 16,
                'doctor_id' => 4,
                'title' => 'Disorganized and Unresponsive',
                'rating' => 3.0,
                'review' => 'I’m still dealing with pain and complications.',
                'created_at' => '2024-08-02 07:58:20',
                'updated_at' => '2024-08-02 07:58:20',
            ),
            23 => 
            array (
                'id' => 24,
                'patient_id' => 14,
                'doctor_id' => 4,
                'title' => 'Efficient and Thorough Consultation',
                'rating' => 3.0,
                'review' => 'The treatment he recommended was ineffective, and I felt like he didn’t listen to my symptoms.',
                'created_at' => '2024-08-02 08:48:39',
                'updated_at' => '2024-08-02 08:48:39',
            ),
            24 => 
            array (
                'id' => 25,
                'patient_id' => 14,
                'doctor_id' => 2,
                'title' => 'Top-Notch Medical Service',
                'rating' => 3.0,
                'review' => 'I felt like the experience was traumatic, and I won’t be returning.',
                'created_at' => '2024-08-02 08:49:31',
                'updated_at' => '2024-08-02 08:49:31',
            ),
            25 => 
            array (
                'id' => 26,
                'patient_id' => 14,
                'doctor_id' => 3,
                'title' => 'Expert Diagnosis and Treatment',
                'rating' => 3.0,
                'review' => 'I always felt heard and supported.',
                'created_at' => '2024-08-02 08:51:11',
                'updated_at' => '2024-08-02 08:51:11',
            ),
        ));
        
        
    }
}