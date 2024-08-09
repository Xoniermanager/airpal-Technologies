<?php

namespace App\Http\Controllers\Patient;

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
            $data['patient_id'] = Auth::user()->id;
            $doctorReviewDetails = $this->doctorReviewService->create($data);
            if ($doctorReviewDetails) {
                return response()->json([
                    'status' => true,
                    'message' => "Review Added Successfully",
                    'data'   =>  view("website.doctor.review", [
                        'allReviewDetails' => $this->doctorReviewService->getAllReviewByDoctorId($request->doctor_id)
                    ])->render()
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
        $allReviewDetails = $this->doctorReviewService->getAllReviewByPatientId(Auth()->user()->id);
        return view('patients.reviews.all-review', compact('allReviewDetails'));
    }
}
