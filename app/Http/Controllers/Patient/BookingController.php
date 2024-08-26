<?php

namespace App\Http\Controllers\Patient;

use App\Http\Requests\StoreBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;

class BookingController extends Controller
{
    private $bookingServices;
    public function __construct(BookingServices $bookingServices)
    {
        $this->bookingServices = $bookingServices;
    }

    public function patientBooking(StoreBooking $request)
    {
        $data = $request->validated();
        $bookedSlot = $this->bookingServices->store((object)$data);
        if ($bookedSlot) {
            return response()->json([
                'success' => 'true',
                'data'    => $bookedSlot,
                'status'  => 200

            ]);
        } else {
            return response()->json(['error' => 'Something Went Wrong!! Please try again']);
        }
    }
    public function checkAuth()
    {
        if (Auth::check()) {
            return response()->json(['authenticated' => true]);
        } else {
            return response()->json(['authenticated' => false]);
        }
    }
    public function checkReviewByPatientId(Request $request)
    {
        $doctorId = $request->doctorId;
        if (Auth::user()->role == 3) {
            $checkReview = $this->bookingServices->getAllBookingDetailsByDoctorAndPatientId(Auth::user()->id, $doctorId)->count();
        } else {
            $checkReview = '0';
        }
        return response($checkReview);
    }
}
