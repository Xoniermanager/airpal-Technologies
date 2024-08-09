<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorService;
use App\Http\Services\PatientServices;
use Illuminate\Support\Facades\Validator;

class PatientListController extends Controller
{
  private $patientServices;
  private $doctorServices;

  public function __construct(PatientServices $patientServices, DoctorService $doctorServices)
  {
    $this->patientServices  = $patientServices;
    $this->doctorServices   = $doctorServices;
  }

  public function patientList()
  {
    try {

      $patientList = $this->patientServices->getAllPatientsList();
      $doctorList  = $this->doctorServices->getAllDoctorsList();
      return view('admin.patients.patients', ['patientList' => $patientList, 'doctorList' => $doctorList]);
    } catch (\Exception $e) {
      \Log::error('Error fetching patient list: ' . $e->getMessage());
      return redirect()->back()->with('error', 'There was an error fetching the patient list. Please try again later.');
    }
  }
  public function getPatientListByDoctor(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'doctorId' => 'required|integer|exists:users,id,role,2',
    ]);
    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 422);
    }
    $doctor = $validator->validated();

    try {
        $patientList = $this->patientServices->getPatientListByDoctor($doctor['doctorId']); 
        if($patientList)
        {
          return response()->json([
            'message'  => 'retrieved!',
            'data'     =>  view('admin.patients.patient-list', [
                'patientList' => $patientList
            ])->render()
        ]);
        }


        // return view('admin.patient-list', ['patientList' => $patientList);

    } catch (\Exception $e) {
        \Log::error('Error fetching patient list: ' . $e->getMessage());
        return redirect()->back()->with('error', 'There was an error fetching the patient list. Please try again later.');
    }
  }
}
