<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OurTeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('our_teams')->delete();
        
        \DB::table('our_teams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => 'site-data/our_teams/Dr. Caitlyn Joy Loo-1727258038.jpg',
                'name' => 'Dr. Caitlyn Joy Loo',
                'designation' => 'Chief Data Policy Officer',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'status' => 1,
                'created_at' => '2024-09-25 09:53:58',
                'updated_at' => '2024-09-25 09:53:58',
            ),
            1 => 
            array (
                'id' => 2,
                'image' => 'site-data/our_teams/Dr. Zahra Khosravi-1727258077.jpg',
                'name' => 'Dr. Zahra Khosravi',
                'designation' => 'Chief Medical Officer',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'status' => 1,
                'created_at' => '2024-09-25 09:54:37',
                'updated_at' => '2024-09-25 09:54:37',
            ),
            2 => 
            array (
                'id' => 3,
                'image' => 'site-data/our_teams/David O\'Callaghan-1727258110.jpg',
                'name' => 'David O\'Callaghan',
                'designation' => 'Chief Executive Officer',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'status' => 1,
                'created_at' => '2024-09-25 09:55:10',
                'updated_at' => '2024-09-25 09:55:10',
            ),
            3 => 
            array (
                'id' => 4,
                'image' => 'site-data/our_teams/Ricardo Florez-1727258159.jpg',
                'name' => 'Ricardo Florez',
                'designation' => 'Chief Business Officer',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                'status' => 1,
                'created_at' => '2024-09-25 09:55:36',
                'updated_at' => '2024-09-25 09:55:59',
            ),
        ));
        
        
    }
}