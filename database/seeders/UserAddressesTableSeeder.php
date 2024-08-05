<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_addresses')->delete();
        
        \DB::table('user_addresses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '123 Main St',
                'city' => 'New York',
                'pin_code' => '10001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '123 Main St',
                'city' => 'New York',
                'pin_code' => '10001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '123 Main St',
                'city' => 'New York',
                'pin_code' => '10001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '123 Main St',
                'city' => 'New York',
                'pin_code' => '10001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 5,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '123 Main St',
                'city' => 'New York',
                'pin_code' => '10001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 6,
                'address_type' => 'local',
                'country_id' => 2,
                'state_id' => 3,
                'address' => '101 Hollywood Blvdd',
                'city' => 'Los Angeless',
                'pin_code' => '90002',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-02 05:26:04',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 7,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 1,
                'address' => '456 Broadway',
                'city' => 'New York',
                'pin_code' => '10002',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 8,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '789 Central Park',
                'city' => 'Los Angeles',
                'pin_code' => '90001',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 9,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '101 Hollywood Blvd',
                'city' => 'Los Angeles',
                'pin_code' => '90002',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 10,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 3,
                'address' => '102 Peachtree St',
                'city' => 'Atlanta',
                'pin_code' => '30303',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 11,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 3,
                'address' => '103 Baker St',
                'city' => 'Atlanta',
                'pin_code' => '30304',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 12,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 4,
                'address' => '104 Main St',
                'city' => 'Chicago',
                'pin_code' => '60601',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 13,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '105 Lincoln Park',
                'city' => 'Chicago',
                'pin_code' => '60602',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 14,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '106 Broadway',
                'city' => 'Miami',
                'pin_code' => '33101',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 15,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 2,
                'address' => '107 South Beach',
                'city' => 'Miami',
                'pin_code' => '33102',
                'created_at' => '2024-08-01 11:16:04',
                'updated_at' => '2024-08-01 11:16:04',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 16,
                'address_type' => 'local',
                'country_id' => 1,
                'state_id' => 1,
                'address' => 'Clark tower street 101',
                'city' => 'Taxes',
                'pin_code' => '112122',
                'created_at' => '2024-08-02 07:43:07',
                'updated_at' => '2024-08-02 07:43:07',
            ),
        ));
        
        
    }
}