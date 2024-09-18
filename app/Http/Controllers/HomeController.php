<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Testimonials;
use App\Models\DoctorSpeciality;
use App\Models\PageExtraSection;
use Illuminate\Support\Facades\DB;
use App\Http\Services\FaqsServices;
use App\Http\Services\UserServices;
use App\Http\Services\PartnersServices;
use App\Http\Services\TestimonialServices;
use App\Http\Services\SpecializationServices;
use App\Http\Services\DoctorSpecialityServices;

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
    $pageSections      = PageSection::with('getButtons', 'getContent')->where('page_id',1)->get();
    $pageExtraSections = PageExtraSection::where('page_id',1)->where('status',1)->get();
    
    foreach ($pageSections as $getPageSection) {
      $sections[$getPageSection['section_slug']] = $getPageSection;
    }

    $extraSections = [];
    foreach ($pageExtraSections as $pageExtraSection) 
    {
      $slug = str_replace('\\','_', $pageExtraSection->model);
      $slug = strtolower($slug);
      $extraSections[$slug] = $pageExtraSection->model::orderBy($pageExtraSection->order_with_column,$pageExtraSection->order_by)->take($pageExtraSection->no_of_records)->get();
    }
    // dd($sections);

    
    return view('website.pages.home', [

      'specialties'   =>  $specialtiesByDoctorsCount,
      'sections'      =>  $sections,
      'doctorList'    =>  $extraSections['app_models_user'] ?? null,
      'testimonials'  =>  $extraSections['app_models_testimonial'] ?? null,
    ]);
  }
}
