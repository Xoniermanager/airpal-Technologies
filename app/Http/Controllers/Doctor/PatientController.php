<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorService;
use Illuminate\Support\Facades\Crypt;
use App\Http\Services\PatientServices;
use App\Http\Services\MedicalRecordService;

class PatientController extends Controller
{
  private $doctorService;
  private $patientServices;
  private $medicalRecordService;
  public function __construct(DoctorService $doctorService, PatientServices $patientServices,MedicalRecordService $medicalRecordService,)
  {
    $this->doctorService   = $doctorService;
    $this->medicalRecordService = $medicalRecordService;
    $this->patientServices  = $patientServices;
  }

  public function doctorPatient()
  {
    $finalData = $this->doctorService->getAllPatientByDoctorId(Auth()->user()->id);
    return view('doctor.my-patient.doctor-patients', compact('finalData'));
  }

  public function patientProfile($encryptPatientId)
  {
      try {
        $id = Crypt::decrypt($encryptPatientId);
    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
        abort(404, 'Invalid prescription ID');
    }
    $patientDetail  = $this->patientServices->getPatientsDetailByID($id);
    $patientBooking = $this->patientServices->getAllPatientBookings($id);
    $medicalDetailsRecords = $this->medicalRecordService->getMedicalRecordByPatientId($id);
    return view('doctor.my-patient.patient-profile', ['patientDetail' => $patientDetail, 'patientBooking' => $patientBooking,'medicalRecords' => $medicalDetailsRecords]);
  }

  public function getSearchFilterData(Request $request)
  {
    try {
      $finalData = $this->doctorService->getAllPatientByDoctorId(Auth()->user()->id, $request->search_key);
      return response()->json([
        'success' => 'Filtering',
        'data'    =>  view("doctor.my-patient.list", [
          'finalData' =>  $finalData,
        ])->render()
      ]);
    } catch (\Exception $e) {
      return  $e->getMessage();
    }
  }
}
