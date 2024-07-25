<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;

class PatientController extends Controller
{


    private $user_services;
    private $bookingServices;
    public function __construct(UserServices $user_services, BookingServices $bookingServices)
    {    
      $this->bookingServices = $bookingServices;
      $this->user_services   = $user_services;
    }

    public function doctorPatient()
    {
    $doctorDetails    = $this->user_services->getDoctorDataById(auth::id());
    $appointments     = $this->bookingServices->doctorBookings(auth::id())->get();
    $uniquePatientIds = $appointments->pluck('patient_id')->unique();
    $uniquePatients   = User::whereIn('id',$uniquePatientIds)->get();
    return view('doctor.doctor-patients',['doctorDetails' => $doctorDetails,'patients'=> $uniquePatients ]);
    } 
}
