<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_questions')->delete();
        
        
        
    }
}