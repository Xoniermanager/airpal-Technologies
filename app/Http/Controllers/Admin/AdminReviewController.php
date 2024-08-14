<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorReviewService;

class AdminReviewController extends Controller
{
    private $doctorReviewServices;
    public function __construct(DoctorReviewService $doctorReviewServices)
    {
        $this->doctorReviewServices = $doctorReviewServices;
    }


    public function reviews()
    {
        $allDoctorsReviewDetails = $this->doctorReviewServices->all();
        return view('admin.reviews',['allDoctorsReviewDetails'=> $allDoctorsReviewDetails]);
    }

}
