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
     
    public function patientAccounts()
    {
      return view('patients.patient-accounts');
      
    }
    public function patientAppointmentDetails()
    {
    return view('patients.patient-appointment-details');
    
    }    
    public function patientAppointments()
    {
    return view('patients.patient-appointments');
    
    }    
    public function patientDependant()
    {
    return view('patients.patient-dependant');
    
    }
    public function patientInvoices()
    {
    return view('patients.patient-invoices');
    
    }
    public function patientProfile()
    {
    return view('patients.patient-profile');
    
    }
    public function patientSettings()
    {
    return view('patients.patient-settings');
    
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

 
