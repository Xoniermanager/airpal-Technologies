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
      // Fetch all necessary data for the dashboard
      $totalPatientsCounter    = $this->getTotalPatientsCounter(); 
      $todayAppointmentCounter = $this->getTodayAppointmentCounter();
      $recentAppointments      = $this->getRecentAppointments(); 
      $upcomingAppointments    = $this->getUpComingAppointment(); 
      $recentPatients          = $this->getRecentPatients();
      $totalAttendedBookings   = $this->totalAttendedBookings();


      // Pass all the data to the view
      return view('doctor.dashboard.doctor-dashboard', [
        'totalPatientsCounter'    => $totalPatientsCounter ?? 0,
        'todayAppointmentCounter' => $todayAppointmentCounter ?? 0,
        'recentAppointments'      => $recentAppointments ?? [],
        'upcomingAppointments'    => $upcomingAppointments ?? '',
        'recentPatients'          => $recentPatients ?? [],
        'totalAttendedBookings'   => $totalAttendedBookings ?? [],
        'doctorDetails'           => $this->doctorDetails ?? []
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'status' => 'error',
        'message' => $e->getMessage(),
      ], 500);
    }
  }

  public function totalAttendedBookings()
  {
    return $this->doctorDashboardServices->gettingTotalAttendedBookings(Auth::id());
  }

  public function getTotalPatientsCounter()
  {
    return $this->doctorDashboardServices->getTotalPatientsCounter(Auth::id());
  }

  public function getTodayAppointmentCounter()
  {
    return $this->doctorDashboardServices->getTodayAppointmentCounter(Auth::id());
  }

  public function getAppointments()
  {
    return  $this->doctorDashboardServices->getAppointmentsByDoctorId(Auth::id());
  }
  public function getRecentAppointments()
  {
    return  $this->doctorDashboardServices->getRecentAppointments(Auth::id());
  }

  public function getUpComingAppointment()
  {
    return $this->doctorDashboardServices->getUpComingAppointment(Auth::id());
  }

  public function getRecentPatients()
  {
    return $this->doctorDashboardServices->getRecentPatients(Auth::id());
  }
  public function getAppointmentGraphData(Request $request)
  {
    return $this->doctorDashboardServices->gettingAppointmentGraphData($request->period,Auth::id());
  }
  public function UpdateLatestAppointmentRequestAjax(UpdateLatestAppointmentStatus $request)
  {
    $updateRequest          = $this->bookingServices->updateStatus($request->status, $request->id);
    $allAppointments        = $this->bookingServices->requestedAppointment(Auth::id())->get();
    $allRequestAppointments = $this->getRecentAppointments();
    if ($updateRequest) {
      return response()->json([
        'success'             =>  'Update successfully',
        'requestCounter'      =>  count($allAppointments),
        'data'                =>  view("doctor.dashboard.latest-appointment-list", [
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
    return view('doctor.account.doctor-change-password');
  }
  public function doctorSpecialities()
  {
    return view('doctor.doctor-specialities', ['doctorDetails' => $this->doctorDetails]);
  }
}
