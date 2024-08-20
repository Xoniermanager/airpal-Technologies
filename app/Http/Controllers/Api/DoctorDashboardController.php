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
    private $doctorDetails;
    private $bookingServices;
    private $doctorDashboardServices;

    public function __construct(DoctorDashboardServices $doctorDashboardServices, BookingServices $bookingServices)
    {
        $this->bookingServices = $bookingServices;
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
        return $this->doctorDashboardServices->getTotalPatientsCounter(Auth::guard('api')->user()->id);
    }

    public function getTodayAppointmentCounter()
    {
        return $this->doctorDashboardServices->getTodayAppointmentCounter(Auth::guard('api')->user()->id);
    }

    public function getAppointments()
    {
        return  $this->doctorDashboardServices->getAppointmentsByDoctorId(Auth::guard('api')->user()->id);
    }
    public function getRecentAppointments()
    {
        return  $this->doctorDashboardServices->getRecentAppointments(Auth::guard('api')->user()->id);
    }

    public function getUpComingAppointment()
    {
        return $this->doctorDashboardServices->getUpComingAppointment(Auth::guard('api')->user()->id);
    }

    public function getRecentPatients()
    {
        return $this->doctorDashboardServices->getRecentPatients(Auth::guard('api')->user()->id);
    }
}
