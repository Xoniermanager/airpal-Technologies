<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSpeciality;
use Illuminate\Support\Facades\DB;
use App\Http\Services\FaqsServices;
use App\Http\Services\UserServices;
use App\Http\Services\SpecializationServices;
use App\Http\Services\DoctorSpecialityServices;
use App\Http\Services\PartnersServices;
use App\Http\Services\TestimonialServices;
use App\Models\PageSection;

class HomeController extends Controller
{
  private $user_services;

  private $doctor_specialty;

  private $faqsServices;
  private $testimonialServices;
  private $partnersServices;


  public function __construct(
    UserServices $user_services,
    DoctorSpecialityServices $doctor_specialty,
    FaqsServices $faqsServices,
    TestimonialServices $testimonialServices,
    PartnersServices $partnersServices
  ) {
    $this->user_services        =  $user_services;
    $this->doctor_specialty     =  $doctor_specialty;
    $this->faqsServices         =  $faqsServices;
    $this->testimonialServices  =  $testimonialServices;
    $this->partnersServices    =  $partnersServices;
  }
  public function home()
  {

    $specialtiesByDoctorsCount =  $this->doctor_specialty->getSpecialtyGroupByDoctor();
    $doctors =  $this->user_services->getDoctorDataForFrontend();
    $allFaqs =  $this->faqsServices->all();
 
    $pageSections = PageSection::with('getButtons', 'getContent')->get();
    foreach ($pageSections as $getPageSection) {
      $sections[$getPageSection['section_slug']] = $getPageSection;
    }
    $testimonials = $this->testimonialServices->all();
    $sections['testimonials'] = $testimonials;

    $partners = $this->partnersServices->all();
    $sections['partners'] = $partners;

    return view('website.pages.home', [
      'doctorList'  => $doctors,
      'specialties' => $specialtiesByDoctorsCount,
      'allFaqs'     => $allFaqs,
      'sections'    => $sections,

    ]);
  }
}
