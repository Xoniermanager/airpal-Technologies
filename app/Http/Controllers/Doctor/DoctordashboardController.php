<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Service;
use App\Models\DayOfWeek;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\StateServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CountryServices;

class DoctordashboardController extends Controller
{

    private $user_services;
    private $doctorDetails;
    private $countryServices;
    private $stateServices; 
    public function __construct(UserServices $user_services,
    CountryServices $countryServices,
    StateServices $stateServices,)
    {    
         $this->countryServices= $countryServices;
         $this->stateServices = $stateServices; 
         $this->user_services = $user_services;
         $this->doctorDetails = $this->user_services->getDoctorDataById(Auth::user()->id);
    }




    public function doctorDashboard()
    { 
 
    return view('doctor.doctor-dashboard',['doctorDetails' => $this->doctorDetails ]);
      
    } 
      
      
    public function doctorAccounts()
    {
      return view('doctor.doctor-accounts',['doctorDetails' => $this->doctorDetails ]);
      
    }
    public function doctorTiming()
    {
      return view('doctor.doctor-timing',['doctorDetails' => $this->doctorDetails ]);
      
    } 
    public function doctorAppointmentDetails()
    {
    return view('doctor.doctor-appointment-details',['doctorDetails' => $this->doctorDetails ]);

    }    
    public function doctorAppointments()
    {
    return view('doctor.doctor-appointments',['doctorDetails' => $this->doctorDetails ]);

    } 

    public function doctorProfile()
    {
      $speciality  =  Specialization::all();
      $services    =  Service::all();
      $dayOfWeeks  =  DayOfWeek::all();
      $countries   =  $this->countryServices->all();
      $states      =  $this->stateServices->all();

              
      return view('doctor.doctor-profile.add-doctor',[
        'specialities'=> $speciality,
        'services'    => $services,
        'countries'   => $countries,
        'states'      => $states,
        'dayOfWeeks'  => $dayOfWeeks ]);


   // return view('doctor.doctor-profile.add-doctor',['doctorDetails' => $this->doctorDetails ]);
    } 
    public function doctorChangepass()
    {
    return view('doctor.doctor-change-password',['doctorDetails' => $this->doctorDetails ]);
    } 
    public function doctorRequest()
    {
    return view('doctor.doctor-request',['doctorDetails' => $this->doctorDetails ]);
    } 
    public function doctorSpecialities()
    {
    return view('doctor.doctor-specialities',['doctorDetails' => $this->doctorDetails ]);
    } 
    public function doctorInvoices()
    {
    return view('doctor.doctor-invoices',['doctorDetails' => $this->doctorDetails ]);
    } 

    public function doctorReviews()
    {
    return view('doctor.doctor-reviews',['doctorDetails' => $this->doctorDetails ]);
    } 

    public function doctorSocial()
    {
    return view('doctor.doctor-social',['doctorDetails' => $this->doctorDetails ]);
    } 

    public function doctorPatient()
    {
    return view('doctor.doctor-patients',['doctorDetails' => $this->doctorDetails ]);
    } 

    

}
