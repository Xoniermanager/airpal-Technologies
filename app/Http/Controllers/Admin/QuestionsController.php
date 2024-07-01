<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\QuestionServices;
use App\Models\Specialization;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{

  private $questionServices;
  private $user_services;
  public function __construct(QuestionServices $questionServices, UserServices $user_services,)
  {
    $this->questionServices = $questionServices;
    $this->user_services    = $user_services;
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
      "doctor"     => "required",
      "specialty"  => "required",
      "answer_type" => "required",
      "questions"  => "required",
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

    if ($insertedQuestionsDetails) {
      return response()->json([
        'message'  => 'Added Successfully!',
        'data'     =>  view('admin.questions.question-list', [
          'allQuestions'   =>  $this->questionServices->all()
        ])->render()
      ]);
    } else {
      return response()->json([
        "status" => "error",
        "message" => "Failed to insert questions"
      ]);
    }
  }
  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "id"          => "required",
      "doctor"      => "required",
      "specialty"   => "required",
      "answer_type" => "required",
      "questions"   => "required",
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'errors' => $validator->errors()
      ], 400);
    }
    $payload = [
      "doctor_id"   => $request->doctor,
      "specialty_id" => $request->specialty,
      "answer_type" => $request->answer_type,
      "questions"   => $request->questions
    ];

    if ($this->questionServices->update($payload, $request->id)) {
      return response()->json([
        'message'  => 'Updated Successfully!',
        'data'     =>  view('admin.questions.question-list', [
          'allQuestions' =>  $this->questionServices->all()
        ])->render()
      ]);
    }
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
