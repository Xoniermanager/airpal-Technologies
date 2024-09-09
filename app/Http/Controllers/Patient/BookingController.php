<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBooking;
use App\Http\Controllers\Controller;
use App\Http\Services\PaypalService;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PaymentService;
use Illuminate\Support\Facades\Crypt;
use App\Http\Services\BookingServices;
use App\Http\Requests\GetBookingFeeAndCheckAuth;

class BookingController extends Controller
{
    private $bookingServices;
    private $paypalService;
    private $paymentService;

    public function __construct(BookingServices $bookingServices, PaypalService $paypalService, PaymentService $paymentService)
    {
        $this->bookingServices = $bookingServices;
        $this->paypalService = $paypalService;
        $this->paymentService = $paymentService;
    }

    public function patientBooking(StoreBooking $request)
    {
        $data = $request->validated();

        $bookedSlot = $this->bookingServices->store((object)$data);

        $paramsToGetBookingFee = [
            'doctorId'      =>  $bookedSlot->doctor_id,
            'slotStartTime' =>  $bookedSlot->slot_start_time,
            'slotEndTime'   =>  $bookedSlot->slot_end_time,
            'bookingDate'   =>  $bookedSlot->booking_date
        ];

        $bookingFee = $this->bookingServices->getBookingFee($paramsToGetBookingFee);

        if(!empty($bookingFee) && $bookingFee > 0)
        {
            $paymentLinkDetails = $this->paypalService->generatePaymentLink($bookingFee, $bookedSlot);

            // Update the payment required column to be true as the payment is required for this appointment
            $this->bookingServices->updatePaymentRequired($bookedSlot->id,true);

            return $this->paymentService->savePaymentDetailsAndExtractPaymentLink($bookedSlot,$paymentLinkDetails, $bookingFee);

        }

        if ($bookedSlot)
        {
            return response()->json([
                'success' => 'true',
                'data'    => $bookedSlot,
                'status'  => 200

            ]);
        }
        else
        {
            return response()->json(['error' => 'Something Went Wrong!! Please try again']);
        }
    }

    public function checkAuth(GetBookingFeeAndCheckAuth $request)
    {
        $bookingDate = $request->booking_date;
        $slotStartTime = $request->slot_start_time;
        $slotEndTime = $request->slot_end_time;
        $doctorId = $request->doctor_id;

        if (Auth::check()) 
        {
            $bookingFee = '';
            $paramsToGetBookingFee = [
                'doctorId'      =>  $doctorId,
                'slotStartTime' =>  $slotStartTime,
                'slotEndTime'   =>  $slotEndTime,
                'bookingDate'   =>  $bookingDate
            ];

            $amount = $this->bookingServices->getBookingFee($paramsToGetBookingFee);
            $bookingFee = $amount . ' USD';
            return response()->json(['authenticated' => true, 'bookingFee' => $bookingFee]);
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

    /**
     * After booking or payment success redirect user to success page
     */
    public function bookingSuccess(Request $request)
    {
        $bookingId = $request->query('booking') ?? '';

        if(!empty($bookingId))
        {
            $bookingId = Crypt::decrypt($bookingId);
            $bookingDetails = $this->bookingServices->getBookingSlotById($bookingId)->with('doctor')->first();

            if($bookingDetails)
            {
                $bookingDate = getFormattedDate($bookingDetails->booking_date);
                $bookingSlotTime = 'Slot Time: ' . $bookingDetails->slot_start_time . ' - ' . $bookingDetails->slot_end_time;
                $doctorName = $bookingDetails->doctor->first_name . ' ' . $bookingDetails->doctor->last;
                return view('doctor.success', compact('bookingDate', 'bookingSlotTime', 'doctorName'));
            }
        }
    }

    public function bookingError(Request $request)
    {
        $bookingId = $request->query('booking') ?? '';

        if(!empty($bookingId))
        {
            $bookingId = Crypt::decrypt($bookingId);
            $bookingDetails = $this->bookingServices->getBookingSlotById($bookingId)->with('doctor')->first();

            if($bookingDetails)
            {
                $bookingDate = getFormattedDate($bookingDetails->booking_date);
                $bookingSlotTime = 'Slot Time: ' . $bookingDetails->slot_start_time . ' - ' . $bookingDetails->slot_end_time;
                $doctorName = $bookingDetails->doctor->first_name . ' ' . $bookingDetails->doctor->last;
                return view('doctor.error', compact('bookingDate', 'bookingSlotTime', 'doctorName'));
            }
        }
    }
}
