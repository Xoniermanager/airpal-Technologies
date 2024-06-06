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
            if ( $this->doctor_education_service->addDoctorEducation($request->validated()))
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
}
