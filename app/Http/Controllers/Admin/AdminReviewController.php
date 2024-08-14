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

    public function deleteReviews(Request $request)
    {
        $deleted = $this->doctorReviewServices->deleteReview($request->id);
        $updatedReviewList = $this->doctorReviewServices->all();
        
        if ($deleted) {
            return response()->json([
            'success' => 'Review deleted',
            'data'   =>  view("admin.reviews.reviews-list", [
                'allDoctorsReviewDetails' =>  $updatedReviewList
            ])->render()
            ]);
        } else {
            return response()->json(['error' => 'Something Went Wrong!! Please try again']);
        }
    }

}
