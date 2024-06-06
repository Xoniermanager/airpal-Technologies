<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\DoctorExperienceServices;
use App\Http\Requests\StoreDoctorExperienceRequest;

class DoctorExperienceController extends Controller
{
    //
    private $doctor_experience_service;
    public function __construct(DoctorExperienceServices $doctor_experience_service)
    {
        $this->doctor_experience_service     = $doctor_experience_service;
    }
    public function addDoctorExperience(StoreDoctorExperienceRequest $request)
    {
        // dd($request->all());
        
        $userId = $this->doctor_experience_service->addDoctorExperience($request->validated());

        // if ($userId) {
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Experience records added successfully',
        //         'user_id' => $userId
        //     ]);
        // } else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Failed to add experience records'
        //     ], 500);
        // }
    }
}
