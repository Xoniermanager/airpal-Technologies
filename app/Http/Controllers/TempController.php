<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempController extends Controller
{
    
    public function dependant()
    {
        return view('patients.patient-dependant');

    }
    public function medicalRecords()
    {
        return view('patients.medical-reports');
    }
    public function medicalDetails()
    {
        return view('patients.medical-details');

    }


}
