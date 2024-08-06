<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\QuestionServices;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Services\QuestionOptionServices;
use App\Http\Services\SpecializationServices;

class QuestionController extends Controller
{
    public $specializationService;
    public $questionService;
    public $questionOptionService;
    public function __construct(SpecializationServices $specializationService, QuestionServices $questionService, QuestionOptionServices $questionOptionService)
    {
        $this->specializationService = $specializationService;
        $this->questionService = $questionService;
        $this->questionOptionService = $questionOptionService;
    }
    public function getAllSpecializations()
    {
        try {
            $allSpecializationDetails = $this->specializationService->all();
            return response()->json([
                'status' => true,
                'message' => "Retrieved All Specialization",
                'data' => $allSpecializationDetails
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Specialization"
            ], 500);
        }
    }
    public function addQuestion(StoreQuestionRequest $request)
    {
        try {
            $payload = [
                "doctor_id"    =>  $request->doctor,
                "specialty_id" =>  $request->specialty,
                "answer_type"  =>  $request->answer_type,
                "question"     =>  $request->question
            ];
            $createdQuestionsDetails = $this->questionService->addQuestions($payload);
            if (isset($request->options)) {
                foreach ($request->options as $optionValues) {
                    $payloadForOptions = [
                        'options'     => $optionValues['value'],
                        'question_id' => $createdQuestionsDetails->id
                    ];
                    $this->questionOptionService->addQuestionsOptions($payloadForOptions);
                }
            }
            if ($createdQuestionsDetails) {
                return response()->json([
                    'status' => true,
                    'message' => "Add Question Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Add Question"
            ], 500);
        }
    }

    public function getAllQuestion()
    {
        try {
            $allQuestionDetails = $this->questionService->getQuestionByDoctorId(Auth::guard('api')->user()->id);
            return response()->json([
                'status' => true,
                'message' => "Retrieved All Question",
                'data' => $allQuestionDetails
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Question"
            ], 500);
        }
    }
    public function updateQuestion(StoreQuestionRequest $request, $id)
    {
        try {
            $payload = [
                "doctor_id"    =>  $request->doctor,
                "specialty_id" =>  $request->specialty,
                "answer_type"  =>  $request->answer_type,
                "question"     =>  $request->question
            ];
            $this->questionService->update($payload, $id);
            if ($request->answer_type == "text") {
                $deleteOptionsIfExist =  $this->questionService->deleteOptions($id);
            } else {
                if (isset($request->options)) {
                    foreach ($request->options as $optionValues) {
                        $payloadForOptions = [
                            'options'     => $optionValues['value'],
                            'question_id' => $id
                        ];
                        if (isset($optionValues['option_id'])) {
                            $this->questionOptionService->update($payloadForOptions, $optionValues['option_id']);
                        } else {
                            $this->questionOptionService->addQuestionsOptions($payloadForOptions);
                        }
                    }
                }
            }
            return response()->json([
                'status' => true,
                'message' => "Update Question Successfully"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Add Question"
            ], 500);
        }
    }
    public function deleteQuestion($id)
    {
        try {
            $this->questionService->destroy($id);
            return response()->json([
                'status' => true,
                'message' => "Question Deleted Successfully",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Delete this question"
            ], 500);
        }
    }

    public function getQuestionDetailsById($questionId)
    {
        try {
            $questionDetails = $this->questionService->getSelectedQuestionDetails($questionId);
            return response()->json([
                'status' => true,
                'message' => "Retrieved Question Details",
                'data' => $questionDetails
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Question Details"
            ], 500);
        }
    }
}
