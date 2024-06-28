<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\HospitalsTableSeeder;
use Database\Seeders\SpecializationsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DaysSeeder::class,
            CoursesTableSeeder::class,
            AwardsTableSeeder::class,
            HospitalsTableSeeder::class,
            SpecializationsTableSeeder::class,
            ServicesTableSeeder::class,
            LanguagesTableSeeder::class,
            CountriesAndStatesTableSeeder::class,
            UsersTableSeeder::class,
    ]);
    }
}
