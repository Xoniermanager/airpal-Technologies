<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetBookingFeeAndCheckAuth;
use App\Http\Services\BookingServices;

class PaymentApiController extends Controller
{
    private $bookingServices;

    public function __construct(BookingServices $bookingServices)
    {
        $this->bookingServices = $bookingServices;
    }
    public function checkPaymentRequiredForBooking(GetBookingFeeAndCheckAuth $request)
    {
        $bookingDate = $request->booking_date;
        $slotStartTime = $request->slot_start_time;
        $slotEndTime = $request->slot_end_time;
        $doctorId = $request->doctor_id;

        $paramsToGetBookingFee = [
            'doctorId'      =>  $doctorId,
            'slotStartTime' =>  $slotStartTime,
            'slotEndTime'   =>  $slotEndTime,
            'bookingDate'   =>  $bookingDate
        ];

        $amount = $this->bookingServices->getBookingFee($paramsToGetBookingFee);
        $bookingFee = $amount . ' USD';


        return response()->json([
            'status'    => true,
            'message'   => "Payment details retrieved successfully!",
            'data'      =>  $bookingFee
        ], 200);
    }

    public function getPaymentLink()
    {
        
        // Write script to get payment link, if user opt to continue to pay for booking
    }


    public function updatePaymentDetails()
    {
        // Write script to update payment details in payments table just after after the booking has been success
    }


    public function updatePaymentStatus()
    {
        // Write script to update payment status specifically in case of cancelled
    }
}
