<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DoctorReviewRequest;
use App\Http\Services\DoctorReviewService;

class DoctorReviewController extends Controller
{
    public $doctorReviewService;

    public function __construct(DoctorReviewService $doctorReviewService)
    {
        $this->doctorReviewService = $doctorReviewService;
    }
    public function addDoctorReview(DoctorReviewRequest $request)
    {
        try {
            $data = $request->all();
            $data['patient_id'] = Auth::guard('api')->user()->id;
            $checkDoctorReview = $this->doctorReviewService->checkReviewDoctorAndPatientid($data['patient_id'], $data['doctor_id']);
            if ($checkDoctorReview > 0) {
                return response()->json([
                    'status' => false,
                    'message' => "Unable to Add Review Because You Already Given Ready"
                ], 400);
            } else {
                $doctorReviewDetails = $this->doctorReviewService->create($data);
                return response()->json([
                    'status' => true,
                    'message' => "Review Added Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Add Review"
            ], 500);
        }
    }

    public function getAllReview()
    {
        try {
            $allReviewDetails = $this->doctorReviewService->all();
            return response()->json([
                'status' => true,
                'message' => "Retrieved All Review",
                'data' => $allReviewDetails
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Review Of this patient"
            ], 500);
        }
    }

    public function getReviewDetailById($id)
    {
        try {
            $allReviewDetails = $this->doctorReviewService->getReviewById($id);
            return response()->json([
                'status' => true,
                'message' => "Retrieved Review Details",
                'data' => $allReviewDetails
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Review"
            ], 500);
        }
    }
    public function getAllReviewByDoctorId()
    {

        try {
            $allReviewDetails = $this->doctorReviewService->getAllReviewByDoctorId(Auth::guard('api')->user()->id);
            return response()->json([
                'status' => true,
                'message' => "Retrieved All Review of doctor",
                'data' => $allReviewDetails
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Review Of this patient"
            ], 500);
        }
    }
}
