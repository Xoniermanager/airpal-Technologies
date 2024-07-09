<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDoctorEducationRequest;
use App\Http\Services\DoctorEducationServices;

class DoctorEducationController extends Controller
{
    private $doctor_education_service;
    public function __construct(DoctorEducationServices $doctor_education_service)
    {
        $this->doctor_education_service     = $doctor_education_service;
    }
    public function addDoctorEducation(StoreDoctorEducationRequest $request)
    {  
      $addedDoctorEducation = $this->doctor_education_service->addDoctorEducation($request->all());

            if ($addedDoctorEducation)
             {
               return response()->json([
                     "status"   => "success",
                     "message" => "Doctor education details saved!"
                ]);
             } else 
             {
               return response()->json([
                "status"=> "error",
                "message"=> "Failed to insert doctor details"
               ]);
             }
    }
    public function destroy(Request $request)
    {
        $userId = $request->input('id');
        if ($this->doctor_education_service->deleteDetails($userId)) {
            return response()->json([
                'success' => true,
                'message' => 'Education records deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add education records'
            ], 500);
        }
    }
}
