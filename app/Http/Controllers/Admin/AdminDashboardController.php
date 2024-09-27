<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\AdminDashboardServices;


class AdminDashboardController extends Controller
{
    private $adminDashboardServices;
    private $bookingServices;
    public function __construct(AdminDashboardServices $adminDashboardServices,BookingServices $bookingServices,)
    {
        $this->adminDashboardServices = $adminDashboardServices;
        $this->bookingServices = $bookingServices;
    }



    public function index()
    {
        try {
            $dashboardData   = $this->adminDashboardServices->getDashboardData();
            $appointmentList = $this->bookingServices->getPaginateData();
            // dd($dashboardData );
            return view('admin.dashboard', ['dashboardData' => $dashboardData,'appointments_list'=>$appointmentList]);
        } catch (\Exception $e) {
            \Log::error('Dashboard data retrieval failed: ' . $e->getMessage());
            return redirect()->route('admin.dashboard')->with('error', 'Failed to load dashboard data.');
        }
    }

    public function getAppointmentGraphDataAdmin(Request $request)
    {
      return $this->adminDashboardServices->gettingAppointmentGraphData($request->period);
    }

    public function getRevenueGraphDataAdmin(Request $request)
    {
        return $this->adminDashboardServices->gettingRevenueGraphData($request->period);
    }
}
