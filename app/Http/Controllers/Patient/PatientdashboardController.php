<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientdashboardController extends Controller
{
    //
    public function patientDashboard()
    {
      return view('patients.patient-dashboard');
      
    } 
     
    public function paitentAccounts()
    {
      return view('patients.patient-accounts');
      
    }
    public function paitentAppointmentDetails()
    {
    return view('patients.patient-appointment-details');
    
    }    
    public function paitentAppointment()
    {
    return view('patients.patient-appointment');
    
    }    
    public function paitentDependant()
    {
    return view('patients.patient-dependant');
    
    }
    public function paitentInvoices()
    {
    return view('patients.patient-invoices');
    
    }
    public function paitentProfile()
    {
    return view('patients.patient-profiles');
    
    }
    public function paitentSettings()
    {
    return view('patients.patient-settings');
    
    }
    

}

 
