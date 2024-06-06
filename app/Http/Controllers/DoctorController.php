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
      $doctor = $user->load('specializaions','services','educations','experiences','workingHour.daysOfWeek');
      $data = ($doctor->specializaions);
      $datas = $data->toArray();
      $specialityArray = [];
      foreach ($datas as  $name) {
        $specialityArray[] = $name['name'];
      }
      $specialityArray1 = array_slice($specialityArray, 0, 2);
      $specialityString = implode(', ',$specialityArray1);
      // dd($arr);
      return view('frontend.doctor.doctor-profile')->with('doctor', $doctor)->with('specialityString',$specialityString);
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
