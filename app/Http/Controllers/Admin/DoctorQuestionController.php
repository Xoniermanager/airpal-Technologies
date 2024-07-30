<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\QuestionServices;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Services\QuestionOptionServices;

class DoctorQuestionController extends Controller
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

  // this is for admin 
  public function index()
  {   

    $doctors      =  $this->user_services->all();
    $specialties  =  Specialization::all();
    $allQuestions =  $this->questionServices->all();

    return view("admin.questions.index", ['allQuestions' => $allQuestions, 'doctors' => $doctors, 'specialties' => $specialties]);
  }

  // this is for single doctor 
  public function DoctorQuestionIndex()
  {
    $doctorId     = Auth::user()->id;
    $allQuestions =  $this->questionServices->getDoctorQuestionById($doctorId);
    $doctors      = $this->user_services->all();
    $specialties  = Specialization::all();

    return view("doctor.questions.index", ['allQuestions' => $allQuestions, 'doctors' => $doctors, 'specialties' => $specialties]);
  }


  public function store(StoreQuestionRequest $request)
  {
    $payload = [
      "doctor_id"    =>  $request->doctor,
      "specialty_id" =>  $request->specialty,
      "answer_type"  =>  $request->answer_type,
      "question"     =>  $request->question
    ];

    $createdQuestionsDetails = $this->questionServices->addQuestions($payload);

    if (isset($request->options)) {
      foreach ($request->options as $optionValues) {
          $payloadForOptions = [
              'options'     => $optionValues['value'],
              'question_id' => $createdQuestionsDetails->id
          ];
      $this->questionOptionServices->addQuestionsOptions($payloadForOptions);  
    }
  }
  if (isset($request->answer)) {
        $payloadForText = [
            'options'     => $request->answer,
            'question_id' => $createdQuestionsDetails->id
        ];
    $this->questionOptionServices->addQuestionsOptions($payloadForText);  
  }

  }
  public function update(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'options' => 'sometimes|required|array',
      'options.*.value' => 'string',
      "doctor" => "required|exists:users,id",
      "specialty"   => "required|exists:specializations,id",
      "answer_type" => "required|in:multiple,optional,text",
      "question"    => "required|string",
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
      "question"    => $request->question
    ];
    $this->questionServices->update($payload, $request->id);
      if (isset($request->options)) {
          foreach ($request->options as $optionValues) {
              $payloadForOptions = [
                  'options'     => $optionValues['value'],
                  'question_id' => $request->id
              ];

              if (isset($optionValues['option_id'])) {
                  $this->questionOptionServices->update($payloadForOptions, $optionValues['option_id']);
              } else {
                  $this->questionOptionServices->addQuestionsOptions($payloadForOptions);
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

  
  public function doctorQuestionFilter(Request $request)
  { 
    $allQuestions = $this->questionServices->doctorQuestionFilter($request->all());
    return response()->json([
      'message'     =>  'Successfully retrieved!',
      'data'        =>  view('admin.questions.question-list', [
        'allQuestions'   =>  $allQuestions
      ])->render()
    ]);
  }


  public function deleteQuestion(Request $request)
  {
    if ($this->questionServices->destroy($request->id)) {
      return response()->json([
        'message'     =>  'Delete Successfully!',
        'data'        =>  view('admin.questions.question-list', [
          'allQuestions'   =>  $this->questionServices->getQuestionByDoctorId()
        ])->render()
      ]);
    }
  }

  public function getQuestionDetailsHTML(Request $request)
  {
    $validator = Validator::make($request->all(),[
      'question_id'   =>  'required|integer|exists:doctor_questions,id'
    ]);

    if ($validator->fails()) 
    {
      return response()->json([
        'success' => false,
        'errors'  => $validator->errors()
      ], 400);
    }
    $this->questionServices->getSelectedQuestionHTML($request->question_id); 
  }

}
