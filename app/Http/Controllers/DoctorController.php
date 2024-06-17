<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Http\Services\UserServices;
class DoctorController extends Controller
{
  private $user_services;
  public function __construct(UserServices $user_services)
  {
       $this->user_services = $user_services;
  }

  public function index()
  {
     $doctors = $this->user_services->getDoctorDataForFrontend();
     return view('frontend.doctor.index')->with('doctors', $doctors);
  }


  public function doctorProfile(User $user)
  {       

      $doctor = $user->load('specializations', 'services', 'educations.course', 'experiences', 'workingHour.daysOfWeek','awards.award','doctorAddress.states.country');
      $doctorSpecializations = ($doctor->specializations)->toArray();
      $specializationNames = [];

      foreach ($doctorSpecializations as $specialization) {
          $specializationNames[] = $specialization['name'];
      }

      $topSpecializations = array_slice($specializationNames, 0, 2);
      $specializationsString = implode(', ', $topSpecializations);

      return view('frontend.doctor.doctor-profile')
          ->with('doctor', $doctor)
          ->with('specializationsString', $specializationsString);
  }


  public function doctor_profile()
  {
    return view('pages.doctor_profile');
  } 
  public function appointment()
  {
    return view('pages.appointment');
  }
}
