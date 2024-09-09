<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\PaymentService;
use App\Http\Services\PaypalService;
use App\Models\BookingSlots;
use Illuminate\Support\Facades\Validator;

class BookAppointmentApiController extends Controller
{
    private $bookingAppointmentServices;
    private $paymentService;
    private $paypalService;

    public function __construct(BookingServices $bookingAppointmentServices, PaymentService $paymentService, PaypalService $paypalService)
    {
        $this->bookingAppointmentServices = $bookingAppointmentServices;
        $this->paymentService = $paymentService;
        $this->paypalService = $paypalService;
    }
    public function bookingAppointment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'patient_id'         => ['required', 'exists:users,id'],
                'doctor_id'          => ['required', 'exists:users,id'],
                'booking_date'       => ['required', 'date'],
                'booking_slot_time'  => ['required'],
                'insurance'          => ['boolean'],
                'description'        => ['required'],
                'symptoms'           => ['string'],
                'image'              => ['mimes:jpeg,png,jpg,gif,svg|max:2048'],
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }
            $bookedAppointment = $this->bookingAppointmentServices->store($request);

            // Check if booking fee is required
            $paramsToGetBookingFee = [
                'doctorId'      =>  $bookedAppointment->doctor_id,
                'slotStartTime' =>  $bookedAppointment->slot_start_time,
                'slotEndTime'   =>  $bookedAppointment->slot_end_time,
                'bookingDate'   =>  $bookedAppointment->booking_date
            ];
    
            $bookingFee = $this->bookingAppointmentServices->getBookingFee($paramsToGetBookingFee);

            // Now confirm if booking fee is required generate payment link
            if(!empty($bookingFee) && $bookingFee > 0)
            {
                $redirectUrls = [
                    'success'   =>  route('api.paypal.success'),
                    'cancel'    =>  route('api.paypal.cancel')
                ];

                $paymentLinkDetails = $this->paypalService->generatePaymentLink($bookingFee, $bookedAppointment, $redirectUrls);

                // Update the payment required column to be true as the payment is required for this appointment
                $this->bookingAppointmentServices->updatePaymentRequired($bookedAppointment->id,true);

                $paymentLink =  $this->paymentService->savePaymentDetailsAndExtractPaymentLink($bookedAppointment,$paymentLinkDetails, $bookingFee);
                
                return response()->json($paymentLink, 200);
            }

            if ($bookedAppointment) 
            {
                return response()->json([
                    'status' => true,
                    'message' => "Booked Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Book Appointment"
            ], 500);
        }
    }

    public function cancelAppointment($id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'status'             => ['required', 'in:confirmed,cancelled'],
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }
            $updatedStatus = $this->bookingAppointmentServices->updateStatus($request->status, $id);
            if ($updatedStatus) {
                return response()->json([
                    'status' => true,
                    'message' => "Canceled Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Cancel Appointments"
            ], 500);
        }
    }
    public function allAppointment()
    {
        try {
            $allAppointment = $this->bookingAppointmentServices->patientBookings(Auth::guard('api')->user()->id)->with(['user','prescription','user.specializations','user.services','user.doctorReview'])->get();
            return response()->json([
                'status' => true,
                'message' => "Retrieved All Appointment List",
                'data' => $allAppointment
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Appointment"
            ], 500);
        }
    }

    public function allUpcomingAppointment()
    {
        try {
            $allUpcomingAppointment = $this->bookingAppointmentServices->patientUpcomingBookings(Auth::guard('api')->user()->id);
            return response()->json([
                'status' => true,
                'message' => "Retrieved All Upcoming Appointment List",
                'data' => $allUpcomingAppointment
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Appointment"
            ], 500);
        }
    }
}
