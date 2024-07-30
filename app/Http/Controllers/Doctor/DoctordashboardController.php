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

  public function __construct(UserServices $user_services, DoctorDashboardServices $doctorDashboardServices,BookingServices $bookingServices)
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
          $totalPatientsCounter    = $this->getTotalPatientsCounter() ?? '';
          $todayAppointmentCounter = $this->getTodayAppointmentCounter() ?? '';
          $recentAppointments      = $this->getRecentAppointments()  ?? '';
          $upcomingAppointments    = $this->getUpComingAppointment() ?? '';
          $recentPatients          = $this->getRecentPatients() ?? '';

  
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

  public function getRevenueAndAppointmentGraphData(Request $request)
  {
    // $request get date range,  days/months/year
    // days selection should be maximum of 30 day range, month will include group by month data sand the same way group data by year-wise
  }

  public function UpdateLatestAppointmentRequestAjax(UpdateLatestAppointmentStatus $request)
  {
    
    $updateRequest   = $this->bookingServices->updateStatus($request->status,$request->id);
    $allRequestAppointments = $this->getRecentAppointments();
    $allAppointments = $this->bookingServices->requestedAppointment(Auth::id())->get();
    if($updateRequest)
    {
        return response()->json([
            'success'             =>  'Update successfully',
            'requestCounter'      =>  count($allAppointments),
            'data'                =>  view("doctor.latest-appointment-list", [
            'recentAppointments'  =>  $allRequestAppointments ,
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
