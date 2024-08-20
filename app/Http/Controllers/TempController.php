<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempController extends Controller
{

    public function dependant()
    {
        return view('patients.patient-dependant');

    }
}
