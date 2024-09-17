<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;

class DoctorAppointmentController extends Controller
{


    private $userServices;
    private $bookingServices;

    public function __construct(UserServices $userServices, BookingServices $bookingServices)
    {
        $this->userServices = $userServices;
        $this->bookingServices = $bookingServices;
    }


    public function doctorCurrentDateBookings($doctorId)
    {
        try {
            $appointments = $this->bookingServices->doctorCurrentDateBookings($doctorId)->get();
            if ($appointments->isNotEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Doctor appointments retrieved successfully',
                    'data' => $appointments
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'No appointments found',
                    'data' => []
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve appointments',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function doctorUpcomingBookings($doctorId)
    {
        try {
            $appointments = $this->bookingServices->doctorUpcomingBookings($doctorId)->get();
            if ($appointments->isNotEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Doctor appointments retrieved successfully',
                    'data' => $appointments
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'No appointments found',
                    'data' => []
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve appointments',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function appointmentsById($appointmentID)
    {
        try {
            $appointments = $this->bookingServices->appointmentsById($appointmentID)->get();
            if ($appointments->isNotEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Doctor appointments retrieved successfully',
                    'data' => $appointments
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'No appointments found',
                    'data' => []
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve appointments',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function getAllAppointment()
    {
        try {
            $allAppointments = $this->bookingServices->doctorBookings(Auth::guard('api')->user()->id)->paginate(10);
            if ($allAppointments->isNotEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Doctor appointments retrieved successfully',
                    'data' => $allAppointments
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'No appointments found',
                    'data' => []
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve appointments',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function getFilteredAppointment(Request $request)
    {
        try {
            $data =
                [
                    'key' => $request->key,
                    'doctorId' => Auth::guard('api')->user()->id,
                    'dateSearch' => $request->date,
                    'searchKey' => $request->searchKey

                ];
            $allAppointments = $this->bookingServices->searchDoctorAppointments($data);
            if ($allAppointments->isNotEmpty()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Doctor appointments retrieved successfully',
                    'data' => $allAppointments
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'No appointments found',
                    'data' => []
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve appointments',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
