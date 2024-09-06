<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\HomePageRequest;
use App\Http\Services\FrontendPagesServices;

class PageController extends Controller
{

    private  $frontendPagesServices;

    public function __construct(FrontendPagesServices $frontendPagesServices)
    {
        $this->frontendPagesServices = $frontendPagesServices;
    }
public function home(Page $page)
{
    $getPageSections = $this->frontendPagesServices->getPageSectionsWithAttribute($page->id);

    // Initialize the sections you want to extract
    $sections = [];

    foreach ($getPageSections as $getPageSection) {
        $sections[$getPageSection['section_slug']] = $getPageSection;
    }

    return view('admin.pages.homepage.home', [
        'sections'  => $sections,
        'page'      =>  $page
    ]);
}
    public function storeHomePageDetail(HomePageRequest $request)
    {
        $allPageSectionsData = $this->frontendPagesServices->saveHomepageSections($request);
        
        $sectionsHTML = array();
        foreach ($allPageSectionsData as $pageSectionsData) 
        {
            $slug = $pageSectionsData->section_slug;
            $sectionsHTML[$slug]['data'] = view('admin.pages.homepage.'.$slug ,[
                'sections' =>  [
                    $slug   =>  $pageSectionsData
                ]
            ])->render();
            $sectionsHTML[$slug]['slug'] = $slug; 
        }

        return response()->json([
            'success'   => 'Successfully saved',
            'data'      =>  $sectionsHTML,
            'status'    =>  true
        ]);
    }
}