<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;

class AboutController extends Controller
{
  private $user_services;
  public function __construct(UserServices $user_services)
  {
    $this->user_services =  $user_services;
  }
  public function about()
  {
    $doctors =  $this->user_services->getDoctorDataForFrontend();

    $pageSections = PageSection::where('page_id', 2)->with('getButtons', 'getContent')->get();
    foreach ($pageSections as $getPageSection) {
      $sections[$getPageSection['section_slug']] = $getPageSection;
    }

    return view('website.pages.about', ['doctorList'  => $doctors, 'sections' => $sections]);
  }
}
