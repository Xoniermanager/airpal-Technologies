<?php

namespace App\Http\Controllers\Api\Patient;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientDiaryRequest;
use App\Http\Services\PatientDiaryService;

class PatientDiaryController extends Controller
{

    private $patientDiaryService;

    public function __construct(PatientDiaryService $patientDiaryService)
    {
        $this->patientDiaryService = $patientDiaryService;
    }

    public function getAllPatientDiary()
    {
        try {
            $allDiaryDetails = $this->patientDiaryService->getAllDiaryDetailsByPatientId(Auth()->guard('api')->user()->id);
            if ($allDiaryDetails) {
                return response()->json([
                    'status' => true,
                    'data' => $allDiaryDetails,
                    'message' => "Retrieved Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find"
            ], 500);
        }
    }
    public function addPatientDiary(PatientDiaryRequest $request)
    {
        try {
            $data = $request->all();
            $data['patient_id'] = Auth()->guard('api')->user()->id;
            $diaryDetails = $this->patientDiaryService->getDiaryDetailsByDate(date('Y-m-d'), $data['patient_id']);
            if (isset($diaryDetails) && !empty($diaryDetails)) {
                return response()->json([
                    'status' => false,
                    'message' => "Unable to Add Diary for Today Already Created"
                ], 400);
            } else {
                $response = $this->patientDiaryService->createDetails($data);
                if ($response) {
                    return response()->json([
                        'status' => true,
                        'message' => "Added Successfully"
                    ], 200);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Add Diary"
            ], 500);
        }
    }

    public function getDiaryDetailsById($id)
    {
        try {
            $diaryDetails = $this->patientDiaryService->getDiaryById($id);
            if ($diaryDetails) {
                return response()->json([
                    'status' => true,
                    'data' => $diaryDetails,
                    'message' => "Retrieved Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find"
            ], 500);
        }
    }

    public function updatePatientDiary(PatientDiaryRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['patient_id'] = Auth()->guard('api')->user()->id;
            $data['id'] = $id;
            $response = $this->patientDiaryService->updateDetails($data);
            if ($response) {
                return response()->json([
                    'status' => true,
                    'message' => "Updated Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Update Diary"
            ], 500);
        }
    }
}
