<?php

namespace App\Http\Controllers\Doctor;



use App\Http\Controllers\Controller;
use App\Http\Services\DoctorReviewService;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    private $doctorReviewServices;
    public function __construct(DoctorReviewService $doctorReviewServices)
    {
        $this->doctorReviewServices = $doctorReviewServices;
    }
    public function doctorReviews()
    {
        $doctorReviewDetails   = $this->doctorReviewServices->getAllReviewByDoctorId(auth::id());
        return view('doctor.doctor-reviews',compact('doctorReviewDetails'));
    }
}
