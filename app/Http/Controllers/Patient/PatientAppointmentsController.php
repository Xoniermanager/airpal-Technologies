<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Requests\SearchPatientAppointments;

class PatientAppointmentsController extends Controller
{
    private $bookingServices;
    public function __construct(BookingServices $bookingServices)
    {    
      $this->bookingServices = $bookingServices;
    }
    public function patientAppointments()
    {
      $patientAppointments = $this->bookingServices->patientBookings(Auth::user()->id)->paginate(9);
      $allAppointmentCounter = $this->bookingServices->getAllAppointmentPatientCounter(Auth::id());
      if ($patientAppointments) {
        return view('patients.appointments.patient-appointments', [
          'appointments' => $patientAppointments,
          'counters'     => $allAppointmentCounter,
        ]);
      }
    }   

    public function patientAppointmentFilter(SearchPatientAppointments $searchPatientAppointments)
    {

      $filterParams = $searchPatientAppointments->validated();
      $filtered  = $this->bookingServices->searchDoctorAppointments($filterParams);

      $gridHtml = view("patients.appointments.grid-view", [
        'appointments' =>  $filtered
      ])->render();
  
      $listHtml = view("patients.appointments.list-view", [
        'appointments' =>  $filtered
      ])->render();
  
      return response()->json([
        'success' => 'Searching',
        'data'   =>  [
          'list'  =>  $listHtml,
          'grid'  =>  $gridHtml
        ]
      ]);
    }
}

