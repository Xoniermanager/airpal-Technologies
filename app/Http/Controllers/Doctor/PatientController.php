<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
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
