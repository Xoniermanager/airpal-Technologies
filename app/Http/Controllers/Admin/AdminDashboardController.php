<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\AdminDashboardServices;


class AdminDashboardController extends Controller
{
    private $adminDashboardServices;
    public function __construct(AdminDashboardServices $adminDashboardServices)
    {
        $this->adminDashboardServices = $adminDashboardServices;
    }

    public function index()
    {
        try {
            $dashboardData = $this->adminDashboardServices->getDashboardData();
            // dd($dashboardData );
            return view('admin.dashboard', ['dashboardData' => $dashboardData]);
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
