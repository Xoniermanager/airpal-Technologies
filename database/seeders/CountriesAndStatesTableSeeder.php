<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesAndStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            // Insert countries
            $countries = [
                [
                    'name' => 'United States',
                    'status' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Canada',
                    'status' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'United Kingdom',
                    'status' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'India',
                    'status' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // Add more countries as needed
            ];

            foreach ($countries as $country) {
                $countryId = DB::table('countries')->insertGetId($country);

                // Insert states for each country
                $states = [];

                if ($country['name'] == 'United States') {
                    $states = [
                        ['name' => 'California', 'country_id' => $countryId, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
                        ['name' => 'Texas', 'country_id' => $countryId, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
                        ['name' => 'New York', 'country_id' => $countryId, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
                        // Add more states as needed
                    ];
                } elseif ($country['name'] == 'Canada') {
                    $states = [
                        ['name' => 'Ontario', 'country_id' => $countryId, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
                        ['name' => 'Quebec', 'country_id' => $countryId, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
                        ['name' => 'British Columbia', 'country_id' => $countryId, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
                        // Add more states as needed
                    ];
                } elseif ($country['name'] == 'United Kingdom') {
                    $states = [
                        ['name' => 'England', 'country_id' => $countryId, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
                        ['name' => 'Scotland', 'country_id' => $countryId, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
                        ['name' => 'Wales', 'country_id' => $countryId, 'status' => true, 'created_at' => now(), 'updated_at' => now()],
                        // Add more states as needed
                    ];
                }

                DB::table('states')->insert($states);
            }
        });
    }
}
