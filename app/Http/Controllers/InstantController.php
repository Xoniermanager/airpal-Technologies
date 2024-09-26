<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use Illuminate\Http\Request;
use App\Models\PageExtraSection;
use App\Http\Services\UserServices;
use App\Mail\InstantConsultSendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\SpecializationServices;

class InstantController extends Controller
{
  private $user_services;
  private $specializationServices;

  public function __construct(UserServices $user_services , SpecializationServices $specializationServices)
  {
    $this->user_services =  $user_services;
    $this->specializationServices = $specializationServices;
    
  }
  public function instant()
  {

    $pageSections      = PageSection::with('getButtons', 'getContent')->where('page_id', 4)->get();
    $pageExtraSections = PageExtraSection::where('page_id', 4)->where('status', 1)->get();

    foreach ($pageSections as $getPageSection) {
      $sections[$getPageSection['section_slug']] = $getPageSection;
    }
    $extraSections = [];
    foreach ($pageExtraSections as $pageExtraSection) {
      $slug = str_replace('\\', '_', $pageExtraSection->model);
      $slug = strtolower($slug);
      $extraSections[$slug] = $pageExtraSection->model::orderBy($pageExtraSection->order_with_column, $pageExtraSection->order_by)->take($pageExtraSection->no_of_records)->get();
    }
    
    $doctors =  $this->user_services->getDoctorDataForFrontend();
    $specialtiesByDoctorsCount =  $this->specializationServices->all(); 
    return view('website.pages.instant', [
    'doctorList'    =>  $extraSections['app_models_user'],
    'specialties'   =>  $specialtiesByDoctorsCount,
    'sections'      =>  $sections
  ]);
  }

  public function instantSendMail(Request $request)
  {
    // Validator for custom validation
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'phone' => 'required|digits:10',
      'disease' => 'required|string|max:255',
    ]);

    // If validation fails, return error response
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)  // Send validation errors back to the form
        ->withInput();            // Keep old input values
    }

    // If validation passes, send the email
    $sendMail = Mail::to('xonier.puneet@gmail.com')->send(new InstantConsultSendMail($validator->validate()));

    if ($sendMail) {
      return response()->json([
        'success' => true,
        'message' => 'Mail send successfully'
      ], 200);
    } else {
      return response()->json([
        'success' => false,
        'message' => 'Something went wrong'
      ], 500);
    }
  }
}
