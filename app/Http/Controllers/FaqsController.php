<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FaqsServices;
use App\Http\Requests\CreateFaqRequest;
use App\Http\Services\FaqCategoryService;
use App\Models\Faqs;

class FaqsController extends Controller
{

  private $faqsServices;
  private $faqCategoryService;
  
  public function __construct(FaqsServices $faqsServices, FaqCategoryService $faqCategoryService)
  {
    $this->faqsServices = $faqsServices;
    $this->faqCategoryService = $faqCategoryService;
  }

  public function index()
  {
    $allFaqs =  $this->faqsServices->getPaginateData();
    $allFaqCategories =  $this->faqCategoryService->getAlFaqCategories();
    return view("admin.faqs.index", [
      'allFaqs'           => $allFaqs,
      'allFaqCategories'  =>  $allFaqCategories
    ]);
  }

  public function store(CreateFaqRequest $request)
  {
    $addedFaqsDetails = $this->faqsServices->addFaqs($request->validated());

    if ($addedFaqsDetails) {
      return response()->json([
        'message'  => 'Added Successfully!',
        'success'  => true,
        'data'     =>  view('admin.faqs.faqs-list', [
          'allFaqs'   =>  $this->faqsServices->getPaginateData()
        ])->render()
      ]);
    } else {
      return response()->json([
        "status" => "error",
        "message" => "Failed to insert faqs"
      ]);
    }
  }
  public function update(Faqs $faq ,CreateFaqRequest $request)
  {
    $data = $request->validated();

    if ($this->faqsServices->update($data, $faq->id)) {
      return response()->json([
        'message'  => 'Updated Successfully!',
        'data'     =>  view('admin.faqs.faqs-list', [
          'allFaqs' =>  $this->faqsServices->getPaginateData()
        ])->render()
      ]);
    }
  }

  public function destroy(Request $request)
  {

    if ($this->faqsServices->destroy($request->id)) {
      return response()->json([
        'message'     =>  'Delete Successfully!',
        'data'        =>  view('admin.faqs.faqs-list', [
          'allFaqs'   =>  $this->faqsServices->getPaginateData()
        ])->render()
      ]);
    }
  }

  public function faqPageIndex()
  {
    $allFaqs =    $this->faqsServices->all();
    return view("website.pages.faq", ['allFaqs' => $allFaqs]);
  }

  /**
   * Get Frequently Asked question Details
   */
  public function getFAQDetails(Faqs $faq)
  {
    return response()->json([
      'status'  =>  true,
      'data'    =>  $faq 
    ]);
  }
}
