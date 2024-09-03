<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Models\BookingSlots;
use Illuminate\Support\Facades\Validator;

class BookAppointmentApiController extends Controller
{
    public $bookingAppointmentServices;
    public function __construct(BookingServices $bookingAppointmentServices)
    {
        $this->bookingAppointmentServices = $bookingAppointmentServices;
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
            if ($bookedAppointment) {
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
            $allAppointment = $this->bookingAppointmentServices->patientBookings(Auth::guard('api')->user()->id)->with('user')->get();
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
    public function getMeetingDetails($meetingId)
    {
        try {
            $bookingDetails = $this->bookingAppointmentServices->getBookingDetailsByMeetingId($meetingId);
            if (!empty($bookingDetails)) {
                return response()->json([
                    'status' => true,
                    'message' => "Retrieved Meeting Details",
                    'data' => $bookingDetails
                ], 200);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => "No Details Found for this Meeting Id",
                ], 401);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Meeting Details"
            ], 500);
        }
    }
}
