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
  private $specializationServices;


  public function __construct(
    UserServices $user_services,
    DoctorSpecialityServices $doctor_specialty,
    FaqsServices $faqsServices,
    TestimonialServices $testimonialServices,
    PartnersServices $partnersServices,
    SpecializationServices $specializationServices
  ) {
    $this->user_services        =  $user_services;
    $this->doctor_specialty     =  $doctor_specialty;
    $this->faqsServices         =  $faqsServices;
    $this->testimonialServices  =  $testimonialServices;
    $this->partnersServices    =  $partnersServices;
    $this->specializationServices = $specializationServices;
  }
  public function home()
  {
    
    $specialtiesByDoctorsCount =  $this->specializationServices->all(); 
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
      // $extraSections[$slug] = $pageExtraSection->model::orderBy($pageExtraSection->order_with_column,$pageExtraSection->order_by)
      // ->take($pageExtraSection->no_of_records)->get();

      if ($pageExtraSection->model == User::class) {
        // If the model is User, filter by role_id = 2 (doctors)
        $extraSections[$slug] = User::where('role', 2) // Add simple where condition for role_id
            ->where('profile_status','>=',site('profile_status')) 
            ->orderBy($pageExtraSection->order_with_column, $pageExtraSection->order_by)
            ->take($pageExtraSection->no_of_records)
            ->get();
    } else {
        // For other models, proceed as normal
        $extraSections[$slug] = $pageExtraSection->model::orderBy($pageExtraSection->order_with_column, $pageExtraSection->order_by)
            ->take($pageExtraSection->no_of_records)
            ->get();
    }
    }
    return view('website.pages.home', [

      'specialties'   =>  $specialtiesByDoctorsCount,
      'sections'      =>  $sections,
      'doctorList'    =>  $extraSections['app_models_user'] ?? null,
      'testimonials'  =>  $extraSections['app_models_testimonial'] ?? null,
    ]);
  }
}
