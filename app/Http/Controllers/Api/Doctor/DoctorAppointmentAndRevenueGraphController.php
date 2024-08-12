<?php

namespace App\Http\Controllers\Api\Doctor;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\BookingServices;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\DoctorDashboardServices;

class DoctorAppointmentAndRevenueGraphController extends Controller
{

    private $bookingServices;
    private $doctorDashboardServices;

    public function __construct(BookingServices $bookingServices, DoctorDashboardServices $doctorDashboardServices)
    {
        $this->bookingServices = $bookingServices;
        $this->doctorDashboardServices = $doctorDashboardServices;
    }
    public function getAppointmentAndRevenueGraphData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'period'   => 'required|in:currentMonth,monthly,yearly',
            'doctorId' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "error" => 'validation_error',
                "status" => 422,
                "message" => $validator->errors(),
            ], 422);
        }
        $payload = $validator->validated();
        try {
            $revenueData     = $this->bookingServices->gettingRevenueDetailForChart($payload['period'], $payload['doctorId']);
            $appointmentData = $this->doctorDashboardServices->gettingAppointmentGraphData($payload['period'], $payload['doctorId']);

            $revenueAndAppointmentGraphData = [];
            if ($revenueData || $appointmentData) {
                $revenueAndAppointmentGraphData['revenue'] = $revenueData;
                $revenueAndAppointmentGraphData['appointment'] = $appointmentData;
            }
            if ($revenueAndAppointmentGraphData) {
                return response()->json([
                    'status'  => 200,
                    'data'    => $revenueAndAppointmentGraphData,
                    'message' => "Appointment and Revenue detail retrieved Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to retrieve Data"
            ], 500);
        }
    }

    public function getRevenueGraphData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'period'   => 'required|in:currentMonth,monthly,yearly',
            'doctorId' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "error" => 'validation_error',
                "status" => 422,
                "message" => $validator->errors(),
            ], 422);
        }
        $payload = $validator->validated();
        try {
            $revenueData = $this->bookingServices->gettingRevenueDetailForChart($payload['period'], $payload['doctorId']);
            if ($revenueData) {
                return response()->json([
                    'status'  => 200,
                    'data'    => $revenueData,
                    'message' => "Revenue detail retrieved Successfully"
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to retrieve Data"
            ], 500);
        }
    }
}
