<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\QuestionServices;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Services\QuestionOptionServices;

class DoctorPanelQuestionController extends Controller
{

  private $questionServices;
  private $user_services;
  private $questionOptionServices;
  public function __construct(QuestionServices $questionServices, UserServices $user_services, QuestionOptionServices $questionOptionServices)
  {
    $this->questionServices = $questionServices;
    $this->user_services    = $user_services;
    $this->questionOptionServices = $questionOptionServices;
  }
  public function index()
  {
    $allQuestions = $this->questionServices->getDoctorQuestionById(Auth::user()->id);
    $specialties  = Specialization::all();
    return view("doctor.questions.index", ['allQuestions' => $allQuestions, 'specialties' => $specialties]);
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
    return response()->json([
      'message'  => 'Question Created Successfully!',
      'data'     =>  view('doctor.questions.question-list', [
        'allQuestions' =>   $this->questionServices->getDoctorQuestionById(Auth::user()->id)
      ])->render()
    ]);
  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "doctor"            => "required|exists:users,id",
      "specialty"         => "required|exists:specializations,id",
      "answer_type"       => "required|in:multiple,optional,text",
      "question"          => "required|string",
      'options'           => 'required_if:answer_type,==,optional,multiple|array',
      'options.*.value'   => 'required|string',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'errors'  => $validator->errors()
      ], 400);
    }

    $this->questionServices->update($request->only(['doctor_id', 'specialty_id', 'answer_type', 'question']), $request->id);

    if ($request->answer_type == "text") {
      $deleteOptionsIfExist =  $this->questionServices->deleteOptions($request->id);
    } else {
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
    }
    return response()->json([
      'message'  => 'Updated Successfully!',
      'data'     =>  view('doctor.questions.question-list', [
        'allQuestions' =>   $this->questionServices->getDoctorQuestionById(Auth::user()->id)
      ])->render()
    ]);
  }


  public function getQuestionDetailsHTML(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'question_id'   =>  'required|integer|exists:doctor_questions,id'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'errors'  => $validator->errors()
      ], 400);
    }
    $questionDetails = $this->questionServices->getSelectedQuestionDetails($request->question_id);
    $specialties  = Specialization::all();
    return response()->json([
      'message'           =>  ' Successfully!',
      'data'              =>  view('doctor.questions.update-question-popup', [
        'questionDetails' =>  $questionDetails,
        'specialties'     =>  $specialties
      ])->render()
    ]);
  }

  public function deleteQuestion(Request $request)
  {
    if ($this->questionServices->destroy($request->id)) {
      return response()->json([
        'message'     =>  'Delete Successfully!',
        'data'        =>  view('doctor.questions.question-list', [
          'allQuestions'   =>  $this->questionServices->getQuestionByDoctorId(Auth()->user()->id)
        ])->render()
      ]);
    }
  }

  public function doctorQuestionFilter(Request $request)
  {
    $allQuestions = $this->questionServices->doctorQuestionFilter($request->all());
    return response()->json([
      'message'     =>  'Successfully retrieved!',
      'data'        =>  view('doctor.questions.question-list', [
        'allQuestions'   =>  $allQuestions
      ])->render()
    ]);
  }


}
