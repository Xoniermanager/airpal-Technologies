<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'first_name' => 'Jack',
                'last_name' => 'Mos',
                'display_name' => 'Jack Mos',
                'gender' => 'Male',
                'phone' => '1234562890',
                'email' => 'jack@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'Nasal endoscopic sinus surgery, tympanoplasty surgery, skull base surgery, surgery for snoring and micro-ear surgery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'James',
                'last_name' => 'Smith',
                'display_name' => 'Jane Smith',
                'gender' => 'Female',
                'phone' => '9876543220',
                'email' => 'James@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Sara',
                'last_name' => 'Corner',
                'display_name' => 'Sara Corner',
                'gender' => 'Female',
                'phone' => '9876540001',
                'email' => 'sara@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Albert',
                'last_name' => 'Road',
                'display_name' => 'Albert Road',
                'gender' => 'Male',
                'phone' => '9876540000',
                'email' => 'albert@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ivy',
                'last_name' => 'Welliams',
                'display_name' => 'Ivy Welliams',
                'gender'=> 'Female',
                'phone' => '9876540000',
                'email' => 'ivy@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Thomas',
                'last_name' => 'Sow',
                'display_name' => 'Thomas Sow',
                'gender'=> 'Male',
                'phone' => '9876540000',
                'email' => 'thomas@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jackson',
                'last_name' => 'White',
                'display_name' => 'Jackson White',
                'gender'=> 'Male',
                'phone' => '9876540000',
                'email' => 'jackson@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Lee',
                'last_name' => 'White',
                'display_name' => 'Jackson White',
                'gender'=> 'Male',
                'phone' => '9876540110',
                'email' => 'lee@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Taylor',
                'last_name' => 'Shift',
                'display_name' => 'Taylor Shift',
                'gender'=> 'Female',
                'phone' => '9876540110',
                'email' => 'taylor@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Scott',
                'last_name' => 'Land',
                'display_name' => 'Scott Land',
                'gender'=> 'Male',
                'phone' => '9876540110',
                'email' => 'scott@example.com',
                'role'  => '3',
                'image_url' => 'path_to_image.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $addresses = [
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 1,
                'address' => '123 Main St',
                'city' => 'New York',
                'pin_code' => '10001',
            ],
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 1,
                'address' => '456 Broadway',
                'city' => 'New York',
                'pin_code' => '10002',
            ],
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '789 Central Park',
                'city' => 'Los Angeles',
                'pin_code' => '90001',
            ],
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '101 Hollywood Blvd',
                'city' => 'Los Angeles',
                'pin_code' => '90002',
            ],
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 3,
                'address' => '102 Peachtree St',
                'city' => 'Atlanta',
                'pin_code' => '30303',
            ],
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 3,
                'address' => '103 Baker St',
                'city' => 'Atlanta',
                'pin_code' => '30304',
            ],
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 4,
                'address' => '104 Main St',
                'city' => 'Chicago',
                'pin_code' => '60601',
            ],
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '105 Lincoln Park',
                'city' => 'Chicago',
                'pin_code' => '60602',
            ],
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '106 Broadway',
                'city' => 'Miami',
                'pin_code' => '33101',
            ],
            [
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '107 South Beach',
                'city' => 'Miami',
                'pin_code' => '33102',
            ],
        ];

        foreach ($users as $key => $user) {
            // Insert user
            $userId = DB::table('users')->insertGetId($user);

            // Assign an address to the user
            $address = $addresses[$key];
            $address['user_id'] = $userId;
            $address['created_at'] = now();
            $address['updated_at'] = now();

            DB::table('user_addresses')->insert($address);
        }
    }
}
