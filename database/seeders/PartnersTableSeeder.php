<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('partners')->delete();
        
        \DB::table('partners')->insert(array (
            0 => 
            array (
                'id' => 15,
                'image' => 'site-data/partners/1727259934.png',
                'status' => 1,
                'created_at' => '2024-09-25 10:25:34',
                'updated_at' => '2024-09-25 10:25:34',
            ),
            1 => 
            array (
                'id' => 16,
                'image' => 'site-data/partners/1727259944.png',
                'status' => 1,
                'created_at' => '2024-09-25 10:25:44',
                'updated_at' => '2024-09-25 10:25:44',
            ),
            2 => 
            array (
                'id' => 17,
                'image' => 'site-data/partners/1727259974.png',
                'status' => 1,
                'created_at' => '2024-09-25 10:26:14',
                'updated_at' => '2024-09-25 10:26:14',
            ),
            3 => 
            array (
                'id' => 18,
                'image' => 'site-data/partners/1729509978.png',
                'status' => 1,
                'created_at' => '2024-10-21 11:26:18',
                'updated_at' => '2024-10-21 11:26:18',
            ),
            4 => 
            array (
                'id' => 19,
                'image' => 'site-data/partners/1729509992.png',
                'status' => 1,
                'created_at' => '2024-10-21 11:26:32',
                'updated_at' => '2024-10-21 11:26:32',
            ),
        ));
        
        
    }
}