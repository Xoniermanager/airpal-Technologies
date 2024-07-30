<?php

namespace App\Http\Controllers\Doctor;


use App\Models\BookingSlots;
use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\DoctorDashboardServices;
use App\Http\Requests\SearchAppointmentsRequest;

class DoctorAppointmentController extends Controller
{
  private $user_services;
  private $bookingServices;
  private $doctorDashboardServices;
  public function __construct(UserServices $user_services, BookingServices $bookingServices, DoctorDashboardServices $doctorDashboardServices)
  {
    $this->user_services   = $user_services;
    $this->bookingServices = $bookingServices;
    $this->doctorDashboardServices = $doctorDashboardServices;
  }

  public function doctorAppointments()
  {
    try {
      $allAppointments = $this->bookingServices->doctorBookings(Auth::id())->paginate(9)->setPath(route('doctor.appointments.index'));
      $allAppointmentCounter = $this->bookingServices->getAllAppointmentCounter(Auth::id());
      if ($allAppointmentCounter) {
        return view('doctor.appointments.doctor-appointments', [
          'bookings' => $allAppointments,
          'counters' => $allAppointmentCounter,
        ]);
      }
    } catch (\Exception $e) {
      return  $e->getMessage();
    }
  }

  public function appointmentRequests()
  {
    try {
      $allRequestedAppointments = $this->bookingServices->requestedAppointment(auth::id())->paginate(10);
      return view('doctor.request.patient-request', ['allRequest' => $allRequestedAppointments]);
    } catch (\Exception $e) {
      return  $e->getMessage();
    }
  }

  public function doctorAppointmentFilter(SearchAppointmentsRequest $searchAppointmentsRequest)
  {
    $filterParams = $searchAppointmentsRequest->validated();
    $filtered  = $this->bookingServices->searchDoctorAppointments($filterParams);

    $gridHtml = view("doctor.appointments.appointment-list", [
      'bookings' =>  $filtered
    ])->render();

    $listHtml = view("doctor.appointments.list-view-appointment", [
      'bookings' =>  $filtered
    ])->render();

    return response()->json([
      'success' => 'Searching',
      'data'   =>  [
        'list'  =>  $listHtml,
        'grid'  =>  $gridHtml
      ]
    ]);
  }
  public function doctorAppointmentSearch(Request $request)
  {
    try {
      $filterKey = $request->key;
      $doctorId  = $request->doctorId;
      $filtered  = $this->bookingServices->doctorAppointmentSearch($filterKey, '', $doctorId);
      return response()->json([
        'success' => 'Searching',
        'data'   =>  view("doctor.appointments.appointment-list", [
          'bookings' =>  $filtered
        ])->render()
      ]);
    } catch (\Exception $e) {
      return  $e->getMessage();
    }
  }


  public function UpdateAppointmentStatus(Request $request)
  {
    try {
      $updateRequest   = $this->bookingServices->update($request->all(), $request->patientId);
      $allAppointments = $this->bookingServices->requestedAppointment(Auth::id())->paginate(10)->setPath(route('doctor.doctor-request.index'));
      if ($updateRequest) {
        return response()->json([
          'success'    =>  'Update successfully',
          'requestCounter' => count($allAppointments),
          'data'       =>  view("doctor.request.list", [
            'allRequest' =>  $allAppointments,
          ])->render()
        ]);
      }
    } catch (\Exception $e) {
      return  $e->getMessage();
    }
  }

  public function filterRequestAppointments(Request $request)
  {
    try {
      $filterKey = $request->filterKey;
      $doctorId  = Auth::id();
      $filtered  = $this->bookingServices->filterRequestAppointments($filterKey, $doctorId);
      return response()->json([
        'success' => 'Filtering',
        'data'    =>  view("doctor.request.list", [
          'allRequest' =>  $filtered,

        ])->render()
      ]);
    } catch (\Exception $e) {
      return  $e->getMessage();
    }
  }
}
