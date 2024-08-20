<?php

namespace Database\Seeders;

use App\Models\DayOfWeek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DayOfWeek::query()->delete();
        DayOfWeek::insert([          
        ['name' => 'Monday'],
        ['name' => 'Tuesday'],
        ['name' => 'Wednesday'],
        ['name' => 'Thursday'],
        ['name' => 'Friday'],
        ['name' => 'Saturday'],
        ['name' => 'Sunday']]);
    }
}
