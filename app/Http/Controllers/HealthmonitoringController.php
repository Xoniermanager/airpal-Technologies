<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use App\Models\SectionList;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;

class HealthMonitoringController extends Controller
{
  private $user_services;



  public function __construct(UserServices $user_services)
  {
    $this->user_services        =  $user_services;
  }

  public function health_monitoring()
  {
    // $doctors =  $this->user_services->getDoctorDataForFrontend();

    $pageSections = PageSection::where('page_id', 3)->with('getButtons', 'getContent')->get();
    foreach ($pageSections as $getPageSection) {
      $sections[$getPageSection['section_slug']] = $getPageSection;
    }
    $sectionList = SectionList::where(column: 'page_id', operator: 3)
      ->with('listItems')
      ->get();

    $sections['product_details'] = $sectionList;

    return view('website.pages.health_monitoring', ['sections' => $sections]);
  }
}
