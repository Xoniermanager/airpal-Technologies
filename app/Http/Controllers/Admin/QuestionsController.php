<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\QuestionOptionServices;
use App\Http\Services\QuestionServices;
use App\Models\Specialization;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{

  private $questionServices;
  private $user_services;
  private $questionOptionServices;
  public function __construct(QuestionServices $questionServices, UserServices $user_services,QuestionOptionServices $questionOptionServices)
  {
    $this->questionServices = $questionServices;
    $this->user_services    = $user_services;
    $this->questionOptionServices = $questionOptionServices;
  }
  public function index()
  {
    $allQuestions =  $this->questionServices->all();
    $doctors = $this->user_services->all();
    $specialties = Specialization::all();

    return view("admin.questions.index", ['allQuestions' => $allQuestions, 'doctors' => $doctors, 'specialties' => $specialties]);
  }

  public function store(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'radio.*.options' => 'sometimes|required',
      'checkbox.*.options' => 'sometimes|required',
      'answer'      => 'sometimes|required',
      "doctor"      => "required",
      "specialty"   => "required",
      "answer_type" => "required",
      "questions"   => "required",
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'errors'  => $validator->errors()
      ], 400);
    }
    $payload = [
      "doctor_id"   => $request->doctor,
      "specialty_id" => $request->specialty,
      "answer_type" => $request->answer_type,
      "questions"   => $request->questions
    ];

    $insertedQuestionsDetails = $this->questionServices->addQuestions($payload);

    if (isset($request->options)) {
      foreach ($request->options as $optionValues) {
          $payloadForOptions = [
              'options'     => $optionValues['value'],
              'question_id' => $insertedQuestionsDetails->id
          ];

      $insertedOptions = $this->questionOptionServices->addQuestionsOptions($payloadForOptions);  
    }
  }

  // if(isset($request->checkbox)){
  //   foreach($request->checkbox as $checkboxValues)
  //   {
  //     $payloadForOptions = [
  //       'options' =>  $checkboxValues['options'],
  //       'question_id' => $insertedQuestionsDetails->id 
  //     ];
  //     $insertedOptions = $this->questionOptionServices->addQuestionsOptions($payloadForOptions);  
  //   }
  // }

  
      return response()->json([
        'message'  => 'Added Successfully!',
        'data'     =>  view('admin.questions.question-list', [
          'allQuestions'   =>  $this->questionServices->all()
        ])->render()
      ]);
    
  }
  public function update(Request $request)
  {

    $validator = Validator::make($request->all(), [

      'options.*.value' => 'sometimes|required',
      'answer'      => 'sometimes|required',
      "doctor"      => "required",
      "specialty"   => "required",
      "answer_type" => "required",
      "questions"   => "required",
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'errors'  => $validator->errors()
      ], 400);
    }
    $payload = [
      "doctor_id"    => $request->doctor,
      "specialty_id" => $request->specialty,
      "answer_type"  => $request->answer_type,
      "questions"    => $request->questions
    ];

    $insertedQuestionsDetails = $this->questionServices->update($payload, $request->id);

// Handle options
if (isset($request->options)) {
    foreach ($request->options as $optionValues) {
        $payloadForOptions = [
            'options'     => $optionValues['value'],
            'question_id' => $request->id
        ];

        if (isset($optionValues['option_id'])) {
            // Update existing option
            $insertedOptions = $this->questionOptionServices->update($payloadForOptions, $optionValues['option_id']);
        } else {
            // Add new option
            $insertedOptions = $this->questionOptionServices->addQuestionsOptions($payloadForOptions);
        }
    }
}
    return response()->json([
        'message'  => 'Updated Successfully!',
        'data'     =>  view('admin.questions.question-list', [
          'allQuestions' =>  $this->questionServices->all()
        ])->render()
      ]);
    
  }

  public function destroy(Request $request)
  {

    if ($this->questionServices->destroy($request->id)) {
      return response()->json([
        'message'     =>  'Delete Successfully!',
        'data'        =>  view('admin.questions.question-list', [
          'allQuestions'   =>  $this->questionServices->all()
        ])->render()
      ]);
    }
  }

  public function faqPageIndex()
  {

    $allQuestions =    $this->questionServices->all();
    return view("pages.faq", ['allQuestions' => $allQuestions]);
  }
}
