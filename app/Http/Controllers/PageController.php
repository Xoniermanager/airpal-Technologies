<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\PageExtraSection;
use App\Http\Requests\HomePageRequest;
use App\Http\Services\FrontendPagesServices;
use App\Models\SectionList;

class PageController extends Controller
{

    private  $frontendPagesServices;

    public function __construct(FrontendPagesServices $frontendPagesServices)
    {
        $this->frontendPagesServices = $frontendPagesServices;
    }


    public function savePageExtraSection(Request $request)
    {
        $getPageExtraSections = $this->frontendPagesServices->savePageExtraSection($request->all());

         return response()->json([
            'success'   => 'Successfully saved',
            'data'      =>  $getPageExtraSections,
            'status'    =>  true
        ]);
    }



    public function home(Page $page)
    {
        $getPageSections = $this->frontendPagesServices->getPageSectionsWithAttribute($page->id);

        // Initialize the sections you want to extract
        $sections = [];

        foreach ($getPageSections as $getPageSection) {
            $sections[$getPageSection['section_slug']] = $getPageSection;
        }

        $pageExtraSections = PageExtraSection::where('page_id',1)->get();
        foreach ($pageExtraSections as $pageExtraSection) 
        {
            $slug = str_replace('\\','_',$pageExtraSection->model);
            $slug = strtolower($slug);
            $sections['page_extra_sections'][$slug] = $pageExtraSection;
        }

        return view('admin.pages.homepage.home', [
            'sections'  =>  $sections,
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

    public function aboutUs(Page $page)
    {
        $getPageSections = $this->frontendPagesServices->getPageSectionsWithAttribute($page->id);

        $sections = [];

        foreach ($getPageSections as $getPageSection) {
            $sections[$getPageSection['section_slug']] = $getPageSection;
        }

        $pageExtraSections = PageExtraSection::where('page_id',2)->get();
        foreach ($pageExtraSections as $pageExtraSection) 
        {
            $slug = str_replace('\\','_',$pageExtraSection->model);
            $slug = strtolower($slug);
            $sections['page_extra_sections'][$slug] = $pageExtraSection;
        }
        return view('admin.pages.about_us.about',[
            'sections'  => $sections,
            'page'      =>  $page
        ]);
    }

    public function storeAboutUsPageDetail(Request $request)
    {
        $allPageSectionsData = $this->frontendPagesServices->saveHomepageSections($request);
        
        $sectionsHTML = array();
        foreach ($allPageSectionsData as $pageSectionsData) 
        {
            $slug = $pageSectionsData->section_slug;
            $sectionsHTML[$slug]['data'] = view('admin.pages.about_us.'.$slug ,[
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

    public function healthMonitoring(Page $page)
    {
        $getPageSections = $this->frontendPagesServices->getPageSectionsWithAttribute($page->id);
        $sections = [];
        foreach ($getPageSections as $getPageSection) {
            $sections[$getPageSection['section_slug']] = $getPageSection;
        }
        // dd(    $sections );

        $sectionList = SectionList::where('section_id', 3)->with('listItems')->get();
        if (isset($sections['product_details'])) {
            $sections['product_details']->section_list = $sectionList;
        } else {
            $sections['product_details'] = (object) ['section_list' => $sectionList];
        }

        return view('admin.pages.health_monitoring.health',[
            'sections'  =>  $sections,
            'page'      =>  $page
        ]);
    }

    public function storeHealthMonitoringPageDetail(HomePageRequest $request)
    {
        $allPageSectionsData = $this->frontendPagesServices->saveHomepageSections($request);
        $sectionsHTML = array();
        foreach ($allPageSectionsData as $pageSectionsData) 
        {
            $slug = $pageSectionsData->section_slug;
            $sectionsHTML[$slug]['data'] = view('admin.pages.health_monitoring.'.$slug ,[
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

    public function instantConsultation(Page $page)
    {
        $getPageSections = $this->frontendPagesServices->getPageSectionsWithAttribute($page->id);

        $sections = [];

        foreach ($getPageSections as $getPageSection) {
            $sections[$getPageSection['section_slug']] = $getPageSection;
        }
        return view('admin.pages.instant_consultation.instant',[
            'sections'  =>  $sections,
            'page'      =>  $page
        ]);
    }


    public function storeInstantConsultation(Request $request)
    {

        $allPageSectionsData = $this->frontendPagesServices->saveHomepageSections($request);
        $sectionsHTML = array();
        foreach ($allPageSectionsData as $pageSectionsData) 
        {
            $slug = $pageSectionsData->section_slug;
            $sectionsHTML[$slug]['data'] = view('admin.pages.instant_consultation.'.$slug ,[
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
