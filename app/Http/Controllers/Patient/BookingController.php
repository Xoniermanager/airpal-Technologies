<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBooking;
use App\Http\Controllers\Controller;
use App\Http\Services\PaypalService;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PaymentService;
use App\Http\Services\BookingServices;
use Illuminate\Support\Facades\Session;
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
        $data['patient_id'] = Auth::id();

        $bookedSlot = $this->bookingServices->store((object)$data);
        $paymentLinkResponse = $this->paymentService->getBookingFeePaymentLink($bookedSlot);


        if($paymentLinkResponse == 0)
        {
            if ($bookedSlot)
            {
                return response()->json([
                    'success' => 'true',
                    'data'    => $bookedSlot,
                    'status'  => true

                ]);
            }
            else
            {
                return response()->json(['error' => 'Something Went Wrong!! Please try again']);
            }
        }
        else
        {
            return response()->json($paymentLinkResponse);
        }
    }

    public function checkAuth(GetBookingFeeAndCheckAuth $request)
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

        if (Auth::check())
        {
            $bookingFee = '';
            $amount = $this->bookingServices->getBookingFee($paramsToGetBookingFee);
            $bookingFee = $amount . ' USD';
            return response()->json(['authenticated' => true, 'bookingFee' => $bookingFee,'gobalDate' => getFormattedDate($bookingDate)]);
        } else {
            Session::put('slot_booking',$paramsToGetBookingFee);
            return response()->json(['authenticated' => false]);
        }
    }
    public function checkReviewByPatientId(Request $request)
    {
        $doctorId = $request->doctorId;
        if (Auth::user()->role == config('airpal.roles.patient')) {
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
            $bookingId = getDecryptId($bookingId);
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
            $bookingId = getDecryptId($bookingId);
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
