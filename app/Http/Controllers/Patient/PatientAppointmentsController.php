<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;

class PatientAppointmentsController extends Controller
{
    private $bookingServices;
    public function __construct(BookingServices $bookingServices)
    {    
      $this->bookingServices = $bookingServices;
    }
    public function patientAppointments()
    {
      $patientAppointments = $this->bookingServices->patientBookings(Auth::user()->id)->get();
      return view('patients.appointments.patient-appointments',['appointments' => $patientAppointments]);
    }   

    public function appointmentFilter(Request $request)
    {
        $filterKey = $request->key;
        $patientId = $request->user;
        $filtered  = $this->bookingServices->filter($filterKey, $patientId);
        return response()->json([
            'success' => 'Searching',
            'data'   =>  view("patients.appointments.list", [
            'appointments' =>  $filtered
            ])->render()
          ]);
    }
}

