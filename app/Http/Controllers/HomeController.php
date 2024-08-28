<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSpeciality;
use Illuminate\Support\Facades\DB;
use App\Http\Services\FaqsServices;
use App\Http\Services\UserServices;
use App\Http\Services\SpecializationServices;
use App\Http\Services\DoctorSpecialityServices;

class HomeController extends Controller
{
  private $user_services;

  private $doctor_specialty;

  private $faqsServices;


  public function __construct(UserServices $user_services, DoctorSpecialityServices $doctor_specialty, FaqsServices $faqsServices)
  {
       $this->user_services    = $user_services;
       $this->doctor_specialty = $doctor_specialty;
       $this->faqsServices = $faqsServices;

  }
  public function home()
  {

    $specialtiesByDoctorsCount =  $this->doctor_specialty->getSpecialtyGroupByDoctor();
    $doctors =  $this->user_services->getDoctorDataForFrontend();
    $allFaqs =  $this->faqsServices->all();

    return view('website.pages.home',['doctorList' => $doctors , 'specialties' => $specialtiesByDoctorsCount , 'allFaqs'=>$allFaqs]);
  }

}
