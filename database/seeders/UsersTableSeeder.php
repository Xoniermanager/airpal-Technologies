<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example user data
        $users = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'display_name' => 'Dr. John Doe',
                'gender' => 'Male',
                'phone' => '1234567890',
                'email' => 'john@example.com',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'description' => 'Nasal endoscopic sinus surgery, tympanoplasty surgery, skull base surgery, surgery for snoring and micro-ear surgery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'display_name' => 'Dr. Jane Smith',
                'gender' => 'Female',
                'phone' => '9876543210',
                'email' => 'jane@example.com',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more users as needed
        ];

        foreach ($users as $user) {
            // Insert user
            $userId = DB::table('users')->insertGetId($user);

            // Insert related details
            DB::table('doctor_specialities')->insert([
                'user_id' => $userId,
                'speciality_id' => 1, // Replace with actual specialization_id
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('doctor_languages')->insert([
                'user_id' => $userId,
                'language_id' => 1, // Replace with actual language_id
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('doctor_services')->insert([
                'user_id' => $userId,
                'service_id' => 1, // Replace with actual service_id
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('doctor_education')->insert([
                'user_id' => $userId,
                'course_id' => 1, // Replace with actual course_id
                'institute_name' => 'Example Institute',
                'certificates' => 'Certification Name',
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('doctor_experiences')->insert([
                'user_id' => $userId,
                'job_title' => 'Example Job Title',
                'hospital_id' => 1, // Replace with actual hospital_id
                'location' => 'Example Location',
                'certificates' => 'Certification Name',
                'start_date' => '2020-01-01',
                'end_date' => '2021-12-31',
                'job_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'currently_working' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('doctor_awards')->insert([
                'user_id' => $userId,
                'award_id' => 1, // Replace with actual award_id
                'certificates' => 'Award Certificate',
                'year' => '2022-01-01',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('doctor_working_hours')->insert([
                'user_id' => $userId,
                'day_id' => 1, // Replace with actual day_id
                'available' => true,
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add more related details inserts as needed
        }
    }
}
