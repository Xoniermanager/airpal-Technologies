<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\QuestionServices;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\QuestionOptionServices;

class QuestionsOptionsController extends Controller
{

  private $questionServices;
  private $questionOptionServices;
  public function __construct(QuestionServices $questionServices,QuestionOptionServices $questionOptionServices)
  {
    $this->questionServices = $questionServices;
    $this->questionOptionServices = $questionOptionServices;
  }
  public function index()
  {    
    $allQuestions = $this->questionServices->all();

    $allQuestionOptions =  $this->questionOptionServices->all();
    return view("admin.questions.options_index",['allQuestionOptions'=>$allQuestionOptions ,'allQuestions'=>$allQuestions]);
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "question"     => "required",
      "options"  => "required",
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'errors'  => $validator->errors()
      ], 400);
    }
    $payload = [
      "question_id" => $request->question,
      "options"     => $request->options
    ];
    $insertedQuestionOptionsDetails = $this->questionOptionServices->addQuestionsOptions($payload);

    if ($insertedQuestionOptionsDetails) {
      return response()->json([
        'message'  => 'Added Successfully!',
        'data'     =>  view('admin.questions.options-list', [
          'allQuestionOptions'   =>  $this->questionOptionServices->all()
        ])->render()
      ]);
    } else {
      return response()->json([
        "status" => "error",
        "message" => "Failed to insert questionOptions"
      ]);
    }
  }


  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "question"     => "required",
      "options"  => "required",
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'errors'  => $validator->errors()
      ], 400);
    }
    $payload = [
      "question_id" => $request->question,
      "options"     => $request->options
    ];
    if ($this->questionOptionServices->update($payload, $request->id)) {
      return response()->json([
        'message'  => 'Updated Successfully!',
        'data'     =>  view('admin.questions.options-list', [
          'allQuestionOptions' =>  $this->questionOptionServices->all()
        ])->render()
      ]);
    }
  }

  public function destroy(Request $request)
  {
    if ($this->questionOptionServices->destroy($request->id)) {
      return response()->json([
        'message'  =>  'Delete Successfully!'
      ]);
    }
  }

 
}
