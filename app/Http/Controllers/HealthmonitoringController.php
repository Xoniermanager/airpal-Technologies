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
    $pageSections = PageSection::where('page_id', 3)->with('getButtons', 'getContent')->get();
    
    foreach ($pageSections as $getPageSection) {
      $sections[$getPageSection['section_slug']] = $getPageSection;
    }
    
    $sectionList = SectionList::where('page_id', 3)->with('listItems')->get();

    if (isset($sections['product_details'])) {
        $sections['product_details']->section_list = $sectionList;
    } else {
        $sections['product_details'] = (object) ['section_list' => $sectionList];
    }
    return view('website.pages.health_monitoring', ['sections' => $sections]);
  }
}
