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
    private $user_services;
    private $doctorDetails;
    private $bookingServices;
    private $doctorDashboardServices;

    public function __construct(UserServices $user_services, DoctorDashboardServices $doctorDashboardServices, BookingServices $bookingServices)
    {

        $this->user_services  = $user_services;
        $this->bookingServices = $bookingServices;
        $this->doctorDetails  = $this->user_services->getDoctorDataById(Auth::guard('api')->user()->id);
        $this->doctorDashboardServices = $doctorDashboardServices;
    }

    public function getDashboardDetails()
    {
        try {
            $data =
                [
                    'totalPatientsCounter'    => $this->getTotalPatientsCounter() ?? '',
                    'todayAppointmentCounter' => $this->getTodayAppointmentCounter() ?? '',
                    'recentAppointments'      => $this->getRecentAppointments()  ?? '',
                    'upcomingAppointments'    => $this->getUpComingAppointment() ?? '',
                    'recentPatients'          => $this->getRecentPatients() ?? '',

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
    public function getTotalPatientsCounter()
    {
        return $this->doctorDashboardServices->getTotalPatientsCounter();
    }

    public function getTodayAppointmentCounter()
    {
        return $this->doctorDashboardServices->getTodayAppointmentCounter();
    }

    public function getAppointments()
    {
        return  $this->doctorDashboardServices->getAppointmentsByDoctorId();
    }
    public function getRecentAppointments()
    {
        return  $this->doctorDashboardServices->getRecentAppointments();
    }

    public function getUpComingAppointment()
    {
        return $this->doctorDashboardServices->getUpComingAppointment();
    }

    public function getRecentPatients()
    {
        return $this->doctorDashboardServices->getRecentPatients();
    }
}
