<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\DoctorFilterOnMyPatient;

class PatientController extends Controller
{


  private $user_services;
  private $bookingServices;
  public function __construct(UserServices $user_services, BookingServices $bookingServices)
  {
    $this->bookingServices = $bookingServices;
    $this->user_services   = $user_services;
  }

  public function doctorPatient()
  {
    $appointments     = $this->bookingServices->doctorBookings(auth::id())->get();
    $uniquePatientIds = $appointments->pluck('patient_id')->unique(); // getting unique ids  from bookings
    $uniquePatients   = User::whereIn('id', $uniquePatientIds)->get(); // getting data based on unique ids

    // Group appointments by patient_id and count the bookings for each patient
    $patientBookings = $appointments->groupBy('patient_id')->map(function ($appointments, $patient_id) {
      return $appointments->count();
    });

    $newPatients     = [];
    $regularPatients = [];

    foreach ($patientBookings as $patient_id => $count) {
      if ($count == 1) {
        $newPatients[] = $uniquePatients->firstWhere('id', $patient_id);
      } else {
        $regularPatients[] = $uniquePatients->firstWhere('id', $patient_id);
      }
    }
    return view('doctor.my-patient.doctor-patients', ['patients' => $uniquePatients, 'regularPatients' => count($regularPatients), 'newPatients' => count($newPatients)]);
  }

  public function doctorFilterOnPatient(DoctorFilterOnMyPatient $doctorFilterOnMyPatient)
  {

    $filterParams = $doctorFilterOnMyPatient->validated();
    $filtered = $this->bookingServices->filterOnMyPatient($filterParams);

    if ($filtered) {
      return response()->json([
        'success' => 'Searching',
        'data'   =>  view("doctor.my-patient.list", [
          'patients' =>  $filtered
        ])->render()
      ]);
    } else {
      return response()->json(['error' => 'Something Went Wrong!! Please try again']);
    }
  }
}
