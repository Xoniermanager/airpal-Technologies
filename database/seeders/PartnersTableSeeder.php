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
                'id' => 9,
                'image' => 'partners//private/var/folders/m2/fvm_vtyx647bx0259kphbc700000gn/T/phpzuIrrx-1725711213.png',
                'status' => 1,
                'created_at' => '2024-09-07 12:13:33',
                'updated_at' => '2024-09-07 12:13:33',
            ),
            1 => 
            array (
                'id' => 10,
                'image' => 'partners//private/var/folders/m2/fvm_vtyx647bx0259kphbc700000gn/T/php3U91Lc-1725711219.png',
                'status' => 1,
                'created_at' => '2024-09-07 12:13:39',
                'updated_at' => '2024-09-07 12:13:39',
            ),
            2 => 
            array (
                'id' => 11,
                'image' => 'partners//private/var/folders/m2/fvm_vtyx647bx0259kphbc700000gn/T/phpdOWADo-1725711270.png',
                'status' => 1,
                'created_at' => '2024-09-07 12:14:30',
                'updated_at' => '2024-09-07 12:14:30',
            ),
        ));
        
        
    }
}