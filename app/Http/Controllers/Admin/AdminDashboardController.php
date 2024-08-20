<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            return view('admin.dashboard', ['dashboardData' => $dashboardData]);
        } catch (\Exception $e) {
            \Log::error('Dashboard data retrieval failed: ' . $e->getMessage());
            return redirect()->route('admin.dashboard')->with('error', 'Failed to load dashboard data.');
        }
    }
    
}
