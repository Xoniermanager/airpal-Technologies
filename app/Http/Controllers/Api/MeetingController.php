<?php

namespace App\Http\Controllers\Api;

use App\Models\VideoCallMeetingLogDetail;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\BookingServices;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    public $bookingAppointmentServices;
    public function __construct(BookingServices $bookingAppointmentServices)
    {
        $this->bookingAppointmentServices = $bookingAppointmentServices;
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
                ], 400);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Meeting Details"
            ], 500);
        }
    }

    public function storeVideoDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'meeting_id'         => ['required', 'exists:booking_slots,meeting_id'],
                'person1_name'       => ['required', 'string'],
                'person1_join_time'  => ['required', 'date_format:H:i'],
                'person2_name'       => ['required', 'string'],
                'person2_join_time'  => ['required', 'date_format:H:i'],
                'call_end_time'      => ['required', 'date_format:H:i'],
            ]);
            if ($validator->fails())
            {
                return response()->json([
                    "error" => 'validation_error',
                    "message" => $validator->errors(),
                ], 422);
            }
            $existingMeetingDetails = VideoCallMeetingLogDetail::where('meeting_id', $request->meeting_id)->first();
            if (isset($existingMeetingDetails) && !empty($existingMeetingDetails)) {
                return response()->json([
                    'status' => true,
                    'message' => "This Meeting Id Details Already Exist You Can Not Store This Details"
                ], 400);
            } else {
                VideoCallMeetingLogDetail::create($request->all());
                return response()->json([
                    'status' => true,
                    'message' => "Video Call Details Stored Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to Store the Details"
            ], 500);
        }
    }
}
