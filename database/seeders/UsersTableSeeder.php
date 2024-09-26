<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'display_name' => 'Dr. John Doe',
                'gender' => 'Male',
                'experience_years' => 2,
                'role' => 2,
                'phone' => '1234567890',
                'email' => 'john@example.com',
                'image_url' => 'site-data/profile-image/John-1726723967.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => '2024-08-01 11:16:00',
                'password' => '$2y$12$.HreI2/Rh9WroDh4M1a9B.lCuyPBnZMG3yrNCyKERHVCi0NMCpjpG',
                'description' => 'Nasal endoscopic sinus surgery, tympanoplasty surgery, skull base surgery, surgery for snoring and micro-ear surgery',
                'allover_rating' => '3.57',
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-09-19 05:32:47',
            ),
            1 =>
            array (
                'id' => 2,
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'display_name' => 'Dr. Jane Smith',
                'gender' => 'Female',
                'experience_years' => 4,
                'role' => 2,
                'phone' => '9876543210',
                'email' => 'jane@example.com',
                'image_url' => 'site-data/profile-image/Jane-1726723676.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => '2024-08-01 11:16:00',
                'password' => '$2y$12$71nS3eJhHUFmO0gcx63jHu9ODYiotiOZskPL/o7HiBB8MN37XZBG.',
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'allover_rating' => '2.2',
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:00',
                'updated_at' => '2024-09-19 05:27:56',
            ),
            2 =>
            array (
                'id' => 3,
                'first_name' => 'Eva',
                'last_name' => 'Smith',
                'display_name' => 'Dr. Eva Smith',
                'gender' => 'Female',
                'experience_years' => 2,
                'role' => 2,
                'phone' => '9876540000',
                'email' => 'eva@example.com',
                'image_url' => 'site-data/profile-image/Eva-1726724055.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => '2024-08-01 11:16:00',
                'password' => '$2y$12$.KE9QjmeWKCNUCmmm.KA.eV9iakSezUSmPbfysF92Af6YhluU8q1C',
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'allover_rating' => '2.8',
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-09-19 05:34:15',
            ),
            3 =>
            array (
                'id' => 4,
                'first_name' => 'Paul',
                'last_name' => 'Walker',
                'display_name' => 'Dr. Paul Walker',
                'gender' => 'Male',
                'experience_years' => 2,
                'role' => 2,
                'phone' => '9876540000',
                'email' => 'paul@example.com',
                'image_url' => 'site-data/profile-image/Paul-1727088215.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => '2024-08-01 11:16:01',
                'password' => '$2y$12$Kl7UH1skYJEjtnxfjQAjoOrF443IV1U05KPheB59J03oE/hZRm/Q2',
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'allover_rating' => '3',
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-09-23 10:43:35',
            ),
            4 =>
            array (
                'id' => 5,
                'first_name' => 'Nina',
                'last_name' => 'Welliams',
                'display_name' => 'Dr. Neena Welliams',
                'gender' => 'Female',
                'experience_years' => 5,
                'role' => 2,
                'phone' => '9876540000',
                'email' => 'nina@example.com',
                'image_url' => 'site-data/profile-image/Nina-1727087668.png',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => '2024-08-01 11:16:01',
                'password' => '$2y$12$M1nbDS5T6BYaYm3uYlXWq.0V3/YNvukRgzZcAOjhw5TpBm7w/rTrG',
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'allover_rating' => '3',
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-09-23 10:34:28',
            ),
            5 =>
            array (
                'id' => 6,
                'first_name' => 'Jack',
                'last_name' => 'Mos',
                'display_name' => '',
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '1234562890',
                'email' => 'jack@example.com',
                'image_url' => 'site-data/profile-image/Jack-1727090470.jpeg',
                'dob' => '1992-08-02',
                'blood_group' => '',
                'email_verified_at' => '2024-08-01 11:16:01',
                'password' => '$2y$12$71nS3eJhHUFmO0gcx63jHu9ODYiotiOZskPL/o7HiBB8MN37XZBG.',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:01',
                'updated_at' => '2024-09-23 11:21:10',
            ),
            6 =>
            array (
                'id' => 7,
                'first_name' => 'James',
                'last_name' => 'Smith',
                'display_name' => '',
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '9876543220',
                'email' => 'James@example.com',
                'image_url' => 'site-data/profile-image/James-1727090376.jpg',
                'dob' => '1996-06-02',
                'blood_group' => '',
                'email_verified_at' => '2024-08-01 11:16:01',
                'password' => '$2y$12$71nS3eJhHUFmO0gcx63jHu9ODYiotiOZskPL/o7HiBB8MN37XZBG.',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:02',
                'updated_at' => '2024-09-23 11:19:36',
            ),
            7 =>
            array (
                'id' => 8,
                'first_name' => 'Sara',
                'last_name' => 'Corner',
                'display_name' => '',
                'gender' => 'Female',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '9876540001',
                'email' => 'sara@example.com',
                'image_url' => 'site-data/profile-image/Sara-1727090654.jpg',
                'dob' => '1992-08-02',
                'blood_group' => '',
                'email_verified_at' => '2024-08-01 11:16:02',
                'password' => '$2y$12$B9OgutwihxgDz5i1e.WFA.GWPTbvTsv8f6yBUH.wBEOE2g9l1cVfS',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:02',
                'updated_at' => '2024-09-23 11:24:14',
            ),
            8 =>
            array (
                'id' => 9,
                'first_name' => 'Albert',
                'last_name' => 'Roadd',
                'display_name' => '',
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '9876540006',
                'email' => 'albert@example.com',
                'image_url' => 'site-data/1722855028.webp',
                'dob' => '1992-08-02',
                'blood_group' => 'A+',
                'email_verified_at' => '2024-08-01 11:16:02',
                'password' => '$2y$12$pjaJs9b5veEGZ6EulCKyVupi9aSeJNsgd1ggxITV783yM0XPWJ.h2',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:02',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            9 =>
            array (
                'id' => 10,
                'first_name' => 'Ivy',
                'last_name' => 'Welliams',
                'display_name' => '',
                'gender' => 'Female',
                'experience_years' => 2,
                'role' => 3,
                'phone' => '9876540000',
                'email' => 'ivy@example.com',
                'image_url' => 'site-data/1722854991.jpg',
                'dob' => '1992-08-02',
                'blood_group' => 'o+',
                'email_verified_at' => '2024-08-01 11:16:02',
                'password' => '$2y$12$4y9X5./BjINcjkqq62RJaOi1XaF1KFUWFi7jBkUl07wZoVy/4KqWW',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:03',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            10 =>
            array (
                'id' => 11,
                'first_name' => 'Thomas',
                'last_name' => 'Sow',
                'display_name' => '',
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '9876540000',
                'email' => 'thomas@example.com',
                'image_url' => 'site-data/1722579357.jpeg',
                'dob' => '1992-08-02',
                'blood_group' => '',
                'email_verified_at' => '2024-08-01 11:16:03',
                'password' => '$2y$12$pg6I6lwvxdmls54Ou3bCf.rEDTnyuFL5wvzHA9e/0i9t7feskZy7C',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:03',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            11 =>
            array (
                'id' => 12,
                'first_name' => 'Jackson',
                'last_name' => 'White',
                'display_name' => 'Jackson White',
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '9876540000',
                'email' => 'jackson@example.com',
                'image_url' => 'site-data/profile-image/Sara-1727090654.jpg',
                'dob' => '1992-08-02',
                'blood_group' => NULL,
                'email_verified_at' => '2024-08-01 11:16:03',
                'password' => '$2y$12$IXcZDpLFfopEcLm.uT5YX.rOzbt8Bx1aM1p7hXkVf9kmrrIfQ4TeO',
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:03',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            12 =>
            array (
                'id' => 13,
                'first_name' => 'Lee',
                'last_name' => 'White',
                'display_name' => 'Lee White',
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '9876540110',
                'email' => 'lee@example.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => '1992-08-02',
                'blood_group' => NULL,
                'email_verified_at' => '2024-08-01 11:16:03',
                'password' => '$2y$12$wFKUz/.2lpQ6gQJFs5nzYOBU29U2bnkVp98ifhPR5auPehOmadl2q',
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            13 =>
            array (
                'id' => 14,
                'first_name' => 'Taylor',
                'last_name' => 'Shift',
                'display_name' => '',
                'gender' => 'Female',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '9876540110',
                'email' => 'taylor@example.com',
                'image_url' => '1722855151.jpeg',
                'dob' => '1992-08-02',
                'blood_group' => '',
                'email_verified_at' => '2024-08-01 11:16:04',
                'password' => '$2y$12$V1gSAPJAzjj7633uw9U56e84JnyZorwFyLm.2vOHirvcbBsjpos3q',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            14 =>
            array (
                'id' => 15,
                'first_name' => 'Scott',
                'last_name' => 'Land',
                'display_name' => 'Scott Land',
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '9876540110',
                'email' => 'scott@example.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => '1992-08-02',
                'blood_group' => NULL,
                'email_verified_at' => '2024-08-01 11:16:04',
                'password' => '$2y$12$3W.vSMtlen5uZ/syew2rtukCqojAzujix66fTnnrPEabtK6LImSxS',
                'description' => 'A competent ENT Surgeon practising for the past 13 years and having a wide range of experience in treating patients with all kinds of ENT issues. Listens to and addresses all of the patients concerns and clearly explains the course of treatment.',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            15 =>
            array (
                'id' => 16,
                'first_name' => 'mike',
                'last_name' => 'malo',
                'display_name' => '',
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '1122334455',
                'email' => 'mike@example.com',
                'image_url' => '1722855100.jpeg',
                'dob' => '2011-06-02',
                'blood_group' => 'o+',
                'email_verified_at' => NULL,
                'password' => '$2y$12$cH09jhFOProBMds83fClKuqBb7eahlpZKPTSX/w9BBW0iVp0mbTpG',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-02 07:39:00',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            16 =>
            array (
                'id' => 18,
                'first_name' => 'Rae',
                'last_name' => 'Richard',
                'display_name' => NULL,
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '1122334455',
                'email' => 'zicij@mailinator.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$7.D77MbCRE3Ldp/qUoXHhO4FNJ/Ehq864k1GUv0kTdZrcbrILYArG',
                'description' => NULL,
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-03 09:59:33',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            17 =>
            array (
                'id' => 19,
                'first_name' => 'Hyacinth',
                'last_name' => 'Henry',
                'display_name' => NULL,
                'gender' => 'Female',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '1122334455',
                'email' => 'vohufihicu@mailinator.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$KmF1xM1dkE8Jy2LxC2IJ9ubiDpGxG5CUU0XpLojTguhSojoBIEnh2',
                'description' => NULL,
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-03 11:25:29',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            18 =>
            array (
                'id' => 20,
                'first_name' => 'Lillian',
                'last_name' => 'Bridges',
                'display_name' => NULL,
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '1122334455',
                'email' => 'lillian@mailinator.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$mr5p7zks08.IrdAnZjnZouW1bdlqZXqw.ZEL/mktH1KAhCCPS6fZ2',
                'description' => NULL,
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-04 06:40:14',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            19 =>
            array (
                'id' => 21,
                'first_name' => 'super',
                'last_name' => 'admin',
                'display_name' => 'super admin',
                'gender' => 'male',
                'experience_years' => 2,
                'role' => 1,
                'phone' => '1111111111',
                'email' => 'superadmin@example.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => '1984-08-02',
                'blood_group' => 'B+',
                'email_verified_at' => NULL,
                'password' => '$2y$12$71nS3eJhHUFmO0gcx63jHu9ODYiotiOZskPL/o7HiBB8MN37XZBG.',
                'description' => NULL,
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2024-08-22 06:39:07',
            ),
            20 =>
            array (
                'id' => 22,
                'first_name' => 'puneet',
                'last_name' => 'verma',
                'display_name' => '',
                'gender' => 'Male',
                'experience_years' => 0,
                'role' => 3,
                'phone' => '1234567890',
                'email' => 'xonier.puneet@gmail.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => '1994-05-21',
                'blood_group' => '',
                'email_verified_at' => NULL,
                'password' => '$2y$12$JrRhlS1XCgOVsraLzF1AWO33Gy9P8SXKlTBoloiBkuMZDXh2sTMZq',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-21 09:16:15',
                'updated_at' => '2024-08-21 12:46:22',
            ),
            21 =>
            array (
                'id' => 23,
                'first_name' => 'Keely',
                'last_name' => 'Wee',
                'display_name' => 'keely wee',
                'gender' => 'Female',
                'experience_years' => 2,
                'role' => 2,
                'phone' => '9876543210',
                'email' => 'keely@example.com',
                'image_url' => 'site-data/profile-image/Keely-1727089107.jpeg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$Zo.f6qszsRjFiV7Aa1OkEe3dMvPA1oR1yOupjxCVgxfv5aRxEw3qa',
                'description' => 'This is testing doctor profile',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-22 10:37:44',
                'updated_at' => '2024-09-23 10:58:27',
            ),
            22 =>
            array (
                'id' => 24,
                'first_name' => 'Teegan',
                'last_name' => 'Mack',
                'display_name' => 'Teegan',
                'gender' => 'Male',
                'experience_years' => NULL,
                'role' => 2,
            'phone' => '+1 (734) 816-2929',
                'email' => 'finu@mailinator.com',
                'image_url' => 'site-data/profile-image/Teegan-1727090013.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$0P0a9iw0Mf.E8uZuYx0wSeM.XDxz4yPQVlCYqZa08opi4hGdFnGdi',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-22 13:47:09',
                'updated_at' => '2024-09-23 11:13:33',
            ),
            23 =>
            array (
                'id' => 25,
                'first_name' => 'Kermit',
                'last_name' => 'Mccarty',
                'display_name' => 'Kermit',
                'gender' => 'Female',
                'experience_years' => 5,
                'role' => 2,
                'phone' => '122345333',
                'email' => 'bisoreze@mailinator.com',
                'image_url' => 'site-data/profile-image/Kermit-1727089782.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$MVW47qgbh8CrNXSFb4K/l.090DBlIKVYX8dpv0g.SSNLcZAENl5wi',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-22 13:55:12',
                'updated_at' => '2024-09-23 11:09:42',
            ),
            24 =>
            array (
                'id' => 26,
                'first_name' => 'Hiroko',
                'last_name' => 'Best',
                'display_name' => 'Hiroko',
                'gender' => 'Female',
                'experience_years' => NULL,
                'role' => 2,
                'phone' => '1212222112',
                'email' => 'tylix@mailinator.com',
                'image_url' => 'site-data/profile-image/Hiroko-1727089605.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$TukOwp7fFpleXRucksm0Aup8214AbLlK/u4gfMSqtJePOk.QjokQu',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-23 04:24:14',
                'updated_at' => '2024-09-23 11:06:45',
            ),
            25 =>
            array (
                'id' => 27,
                'first_name' => 'Raven',
                'last_name' => 'Browning',
                'display_name' => 'Raven',
                'gender' => 'Female',
                'experience_years' => NULL,
                'role' => 2,
                'phone' => '1234567899',
                'email' => 'qunuhicese@mailinator.com',
                'image_url' => 'site-data/profile-image/Raven-1727090126.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$7Sx9M5S1cOMTltzaHJd7Z.8c273LfWoUhx4hDLKF0.WXjzCgKvcJW',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-23 05:09:26',
                'updated_at' => '2024-09-23 11:15:27',
            ),
            26 =>
            array (
                'id' => 28,
                'first_name' => 'Stephen',
                'last_name' => 'Fuller',
                'display_name' => NULL,
                'gender' => 'Male',
                'experience_years' => NULL,
                'role' => 3,
                'phone' => '1234567890',
                'email' => 'ceqi@mailinator.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$b3aPF9Kwvly6pA7xJWflB.MV5kb3ocqaIgLrbMuixwX4yPyrA8Pk6',
                'description' => NULL,
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-23 06:13:19',
                'updated_at' => '2024-08-23 06:13:19',
            ),
            27 =>
            array (
                'id' => 29,
                'first_name' => 'Charde',
                'last_name' => 'Mckenzie',
                'display_name' => NULL,
                'gender' => 'Female',
                'experience_years' => NULL,
                'role' => 3,
                'phone' => '1122334455',
                'email' => 'butegan11@mailinator.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => NULL,
                'blood_group' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$jv/5rbv16Zrozw1GEYXaA.VbA6NRCTn6XSX28hdNZtSa2LfD8W0yO',
                'description' => NULL,
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-23 06:58:41',
                'updated_at' => '2024-08-23 06:58:41',
            ),
            28 =>
            array (
                'id' => 30,
                'first_name' => 'Solar1',
                'last_name' => 'Mckenzie',
                'display_name' => '',
                'gender' => 'Female',
                'experience_years' => NULL,
                'role' => 3,
                'phone' => '1122334455',
                'email' => 'kutegan11@mailinator.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => '1992-02-11',
                'blood_group' => '',
                'email_verified_at' => NULL,
                'password' => '$2y$12$x8Cc5YUliI4uviEo0g2yCeonrp41JKmmaS/9DARRP6xdnXE445.Pe',
                'description' => '',
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => '2024-08-23 07:02:04',
                'updated_at' => '2024-08-29 10:20:37',
            ),
            29 =>
            array (
                'id' => 31,
                'first_name' => 'D K',
                'last_name' => '',
                'display_name' => 'Direndra kumar',
                'gender' => 'male',
                'experience_years' => 0,
                'role' => 1,
                'phone' => '1234567890',
                'email' => 'dhirendra@xoniertechnologies.com',
                'image_url' => 'site-data/1724244129.jpg',
                'dob' => '1984-08-02',
                'blood_group' => 'B+',
                'email_verified_at' => NULL,
                'password' => '$2y$12$71nS3eJhHUFmO0gcx63jHu9ODYiotiOZskPL/o7HiBB8MN37XZBG.',
                'description' => NULL,
                'allover_rating' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2024-08-22 06:39:07',
            ),
        ));


    }
}
