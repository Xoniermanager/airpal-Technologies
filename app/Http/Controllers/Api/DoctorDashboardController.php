<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\DoctorDashboardServices;

class DoctorDashboardController extends Controller
{
    private $userService;
    private $doctorDetails;
    private $bookingServices;
    private $doctorDashboardServices;

    public function __construct(UserServices $userService, DoctorDashboardServices $doctorDashboardServices, BookingServices $bookingServices)
    {
        $this->bookingServices = $bookingServices;
        $this->doctorDetails  = $this->userService->getDoctorDataById(Auth::guard('api')->user()->id);
        $this->doctorDashboardServices = $doctorDashboardServices;
    }

    public function getDashboardDetails()
    {
        try {
            $userId = Auth::guard('api')->user()->id;
            $data =
                [
                    'totalPatientsCounter'    => $this->getTotalPatientsCounter($userId) ?? '',
                    'todayAppointmentCounter' => $this->getTodayAppointmentCounter($userId) ?? '',
                    'recentAppointments'      => $this->getRecentAppointments($userId)  ?? '',
                    'upcomingAppointments'    => $this->getUpComingAppointment($userId) ?? '',
                    'recentPatients'          => $this->getRecentPatients($userId) ?? '',

                ];
            return response()->json([
                "status"  => true,
                "message" => "Retrieved Data for Dashboard",
                "data"    => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function getTotalPatientsCounter($userId)
    {
        return $this->doctorDashboardServices->getTotalPatientsCounter($userId);
    }

    public function getTodayAppointmentCounter($userId)
    {
        return $this->doctorDashboardServices->getTodayAppointmentCounter($userId);
    }

    public function getAppointments($userId)
    {
        return  $this->doctorDashboardServices->getAppointmentsByDoctorId($userId);
    }
    public function getRecentAppointments($userId)
    {
        return  $this->doctorDashboardServices->getRecentAppointments($userId);
    }

    public function getUpComingAppointment($userId)
    {
        return $this->doctorDashboardServices->getUpComingAppointment($userId);
    }

    public function getRecentPatients($userId)
    {
        return $this->doctorDashboardServices->getRecentPatients($userId);
    }
}
