<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\DoctorService;
use App\Http\Services\PatientServices;
use Illuminate\Http\Request;

class PatientListController extends Controller
{
  private $patientServices;
  private $doctorServices; 

  public function __construct(PatientServices $patientServices,DoctorService $doctorServices)
  {
      $this->patientServices  = $patientServices;
      $this->doctorServices   = $doctorServices; 
  }

  public function patientList()
  {
      try {

          $patientList = $this->patientServices->getAllPatientsList();
          $doctorList = $this->doctorServices->getAllDoctorsList();
          return view('admin.patient-list', ['patientList' => $patientList,'doctorList'=> $doctorList]);
      } catch (\Exception $e) {
          \Log::error('Error fetching patient list: ' . $e->getMessage());
          return redirect()->back()->with('error', 'There was an error fetching the patient list. Please try again later.');
      }

      
  }
  
}
