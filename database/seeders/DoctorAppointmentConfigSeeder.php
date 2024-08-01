<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorAppointmentConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     // Retrieve all doctors from the users table
     $doctors = User::where('role', 2)->get();

     $slotsData = [];
     foreach ($doctors as $doctor) {
         $slotsData[] = [
             'user_id' => $doctor->id,
             'slot_duration' => 30,
             'cleanup_interval' => 10,
             'start_month' => '1',
             'end_month' => '30',
             'slots_in_advance' => 20,
             'start_slots_from_date' => Carbon::parse('2024-01-01'),
             'stop_slots_date' => Carbon::parse('2024-12-31'),
             'status' => 1,
             'created_at' => now(),
             'updated_at' => now(),
         ];
         $exceptionDays[] = [
              'doctor_id' => $doctor->id,
              'exception_days_id' => 7,
              'status'=> true,
              'created_at' => now(),
              'updated_at' => now(),
         ];
     }

     DB::table('doctor_slots')->insert($slotsData);
     DB::table('exception_days')->insert($exceptionDays);
    }
}
