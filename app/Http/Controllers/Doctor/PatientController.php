<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Services\DoctorService;

class PatientController extends Controller
{
  private $doctorService;
  public function __construct(DoctorService $doctorService)
  {
    $this->doctorService   = $doctorService;
  }

  public function doctorPatient()
  {
    $finalData = $this->doctorService->getAllPatientByDoctorId(Auth()->user()->id);
    return view('doctor.my-patient.doctor-patients', compact('finalData'));
  }
}
