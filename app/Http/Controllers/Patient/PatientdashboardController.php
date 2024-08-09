<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;

class PatientDashboardController extends Controller
{

    public function patientDashboard()
    {
      return view('patients.patient-dashboard');
      
    } 
    public function patientAccounts()
    {
      return view('patients.patient-accounts');
      
    }
    public function patientAppointmentDetails()
    {
    return view('patients.patient-appointment-details');
    
    }    
  
    public function patientDependant()
    {
      return view('patients.patient-dependant');
    }
    
    public function patientPassword()
    {
    return view('patients.patient-password');
    
    }
    public function Dependant()
    {
    return view('patients.dependant');
    
    }
    public function patientFavourites()
    {
    return view('patients.favourites');
    
    }
    public function patientMedical()
    {
    return view('patients.medical');
    
    }
    public function patientRecords()
    {
    return view('patients.records');
    
    } 
    

}

 
