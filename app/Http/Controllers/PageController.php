<?php

namespace App\Http\Controllers;

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
public function home()
{
    $pageId = 1;
    $getPageSections = $this->frontendPagesServices->getPageSectionsWithAttribute($pageId);

    // Initialize the sections you want to extract
    $sections = [];

    foreach ($getPageSections as $getPageSection) {
        $sections[$getPageSection['section_slug']] = $getPageSection;
    }

    return view('admin.pages.home', [
        'sections' => $sections, 
    ]);
}
    public function storeHomePageDetail(HomePageRequest $request)
    {
       $createdPageDetails = $this->frontendPagesServices->saveHomepageSections($request);
       return response()->json([
        'success' => 'Successfully saved',
        'data'   =>  $createdPageDetails
        ]);
    }
}
