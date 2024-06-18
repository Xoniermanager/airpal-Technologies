<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\FaqsServices;
use Illuminate\Support\Facades\Validator;

class FaqsController extends Controller
{

    private $faqsServices;
    public function __construct(FaqsServices $faqsServices) {
        $this->faqsServices = $faqsServices;
     }
     public function index(){
     $allFaqs =    $this->faqsServices->all();
     return view("admin.faqs.index", ['allFaqs' => $allFaqs]);
  }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'description' => 'required',
          ]);
          if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
          }
          $addedFaqsDetails = $this->faqsServices->addFaqs($request->all());
  
          if ($addedFaqsDetails)
           {
            return response()->json([
              'message'  => 'Added Successfully!',
              'data'     =>  view('admin.faqs.faqs-list', [
               'allFaqs'   =>  $this->faqsServices->all()
              ])->render()
          ]);
           } else 
           {
             return response()->json([
              "status"=> "error",
              "message"=> "Failed to insert faqs"
             ]);
           }

    }
public function update(Request $request)
{
  $id = $request->all()['faqs_id'];
  $validator = Validator::make($request->all(), [
    'name'        => 'required',
    'description' => 'required',
  ]);

  $data  = 
  [
    'name'  => $request->name,
    'description' => $request->description,

  ];
  if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
  }

  if ($this->faqsServices->update($data,$id)) {
    return response()->json([
      'message'  => 'Updated Successfully!',
      'data'     =>  view('admin.faqs.faqs-list', [
       'allFaqs' =>  $this->faqsServices->all()
      ])->render()
    ]);
  }
}

public function destroy(Request $request){

    if ($this->faqsServices->destroy($request->id)) {
      return response()->json([
            'message'     =>  'Delete Successfully!',
            'data'        =>  view('admin.faqs.faqs-list', [
              'allFaqs'   =>  $this->faqsServices->all()
             ])->render()
      ]);
    }
  }

  public function faqPageIndex()
  {

    $allFaqs =    $this->faqsServices->all();
    return view("pages.faq", ['allFaqs' => $allFaqs]);
  }

}

