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
use App\Http\Services\BookingServices;
use App\Http\Services\CountryServices;

class DoctorDashboardController extends Controller
{

    private $user_services;
    private $doctorDetails;
    private $countryServices;
    private $stateServices; 
    private $bookingServices;
    public function __construct(UserServices $user_services,
    CountryServices $countryServices,
    StateServices $stateServices,
    BookingServices $bookingServices,
    )
    {    
         $this->countryServices= $countryServices;
         $this->bookingServices = $bookingServices;
         $this->stateServices = $stateServices; 
         $this->user_services = $user_services;
         $this->doctorDetails = $this->user_services->getDoctorDataById(auth::id()); // todo this set by auth
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
    $allAppointments = $this->bookingServices->doctorBookings($this->doctorDetails->id)->get();
    return view('doctor.doctor-appointments',['doctorDetails' => $this->doctorDetails ,'bookings' => $allAppointments]);

    } 

    public function doctorProfile()
    {
        $singleDoctorDetails = $this->user_services->getDoctorDataById(auth::id());
        $languagesIds = $singleDoctorDetails->language->pluck('id');
        $specialitiesIds = $singleDoctorDetails->specializations->pluck('id');
        $servicesIds = $singleDoctorDetails->services->pluck('id');

        $countries = $this->countryServices->all();
        $states = $this->stateServices->all();
        
        $specialty  = Specialization::all();
        $services   = Service::all();
        $dayOfWeeks = DayOfWeek::all();

        return view('doctor.doctor-profile', [
            'specialities'    => $specialty,
            'languagesIds'    => $languagesIds,
            'specialitiesIds' => $specialitiesIds,
            'servicesIds' => $servicesIds,
            'services'    => $services,
            'countries'   => $countries,
            'states'      => $states,
            'dayOfWeeks'  => $dayOfWeeks,
            'singleDoctorDetails' => $singleDoctorDetails,
            'doctorDetails' => $this->doctorDetails
        ]);
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
