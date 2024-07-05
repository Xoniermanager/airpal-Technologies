<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorEducationServices;
use App\Http\Requests\StoreDoctorEducationRequest;

class DoctorEducationController extends Controller
{
    private $doctor_education_service;
    public function __construct(DoctorEducationServices $doctor_education_service)
    {
        $this->doctor_education_service     = $doctor_education_service;
    }

    public function createOrUpdateEducation(StoreDoctorEducationRequest $request)
    {
        try {
            $addedDoctorEducation = $this->doctor_education_service->addDoctorEducation($request->all());
            if ($addedDoctorEducation) {
                return response()->json([
                    "status"   => "success",
                    "message" => "Doctor education details saved!",
                    "data" =>$addedDoctorEducation
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        if ($this->doctor_education_service->deleteDetails($id)) {
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
