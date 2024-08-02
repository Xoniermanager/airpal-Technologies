<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\DoctorDashboardServices;
use App\Http\Requests\UpdateLatestAppointmentStatus;


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
    $this->doctorDetails  = $this->user_services->getDoctorDataById(auth::id());
    $this->doctorDashboardServices = $doctorDashboardServices;
  }

  public function doctorDashboard()
  {
    try {
      $userId = Auth()->user()->id;
      // Fetch all necessary data for the dashboard
      $totalPatientsCounter    = $this->getTotalPatientsCounter($userId) ?? '';
      $todayAppointmentCounter = $this->getTodayAppointmentCounter($userId) ?? '';
      $recentAppointments      = $this->getRecentAppointments($userId)  ?? '';
      $upcomingAppointments    = $this->getUpComingAppointment($userId) ?? '';
      $recentPatients          = $this->getRecentPatients($userId) ?? '';


      // Pass all the data to the view
      return view('doctor.doctor-dashboard', [
        'totalPatientsCounter'    => $totalPatientsCounter,
        'todayAppointmentCounter' => $todayAppointmentCounter,
        'recentAppointments'      => $recentAppointments,
        'upcomingAppointments'    => $upcomingAppointments,
        'recentPatients' => $recentPatients,
        'doctorDetails'  => $this->doctorDetails
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'status' => 'error',
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

  public function getRevenueAndAppointmentGraphData(Request $request)
  {
    // $request get date range,  days/months/year
    // days selection should be maximum of 30 day range, month will include group by month data sand the same way group data by year-wise
  }

  public function UpdateLatestAppointmentRequestAjax(UpdateLatestAppointmentStatus $request)
  {

    $userId = Auth()->user()->id;
    $updateRequest   = $this->bookingServices->updateStatus($request->status, $request->id);
    $allRequestAppointments = $this->getRecentAppointments($userId);
    $allAppointments = $this->bookingServices->requestedAppointment(Auth::id())->get();
    if ($updateRequest) {
      return response()->json([
        'success'             =>  'Update successfully',
        'requestCounter'      =>  count($allAppointments),
        'data'                =>  view("doctor.latest-appointment-list", [
          'recentAppointments'  =>  $allRequestAppointments,
        ])->render()
      ]);
    }
  }



  public function doctorTiming()
  {
    return view('doctor.doctor-timing', ['doctorDetails' => $this->doctorDetails]);
  }
  public function doctorChangePassword()
  {
    return view('doctor.doctor-change-password', ['doctorDetails' => $this->doctorDetails]);
  }
  public function doctorSpecialities()
  {
    return view('doctor.doctor-specialities', ['doctorDetails' => $this->doctorDetails]);
  }
}
