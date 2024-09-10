<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use Illuminate\Http\Request;
use App\Models\PageExtraSection;
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
    $pageSections      = PageSection::with('getButtons', 'getContent')->where('page_id', 2)->get();
    $pageExtraSections = PageExtraSection::where('page_id', 2)->where('status', 1)->get();

    foreach ($pageSections as $getPageSection) {
      $sections[$getPageSection['section_slug']] = $getPageSection;
    }

    $extraSections = [];
    foreach ($pageExtraSections as $pageExtraSection) {
      $slug = str_replace('\\', '_', $pageExtraSection->model);
      $slug = strtolower($slug);
      $extraSections[$slug] = $pageExtraSection->model::orderBy($pageExtraSection->order_with_column, $pageExtraSection->order_by)->take($pageExtraSection->no_of_records)->get();
    }

    return view('website.pages.about', [
      'sections' => $sections,
      'doctorList'    =>  $extraSections['app_models_user'],
      'testimonials'  =>  $extraSections['app_models_testimonial'],
    ]);
  }
}
