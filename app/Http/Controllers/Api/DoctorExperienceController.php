<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorExperienceServices;
use App\Http\Requests\StoreDoctorExperienceRequest;

class DoctorExperienceController extends Controller
{
    private $doctor_experience_service;
    public function __construct(DoctorExperienceServices $doctor_experience_service)
    {
        $this->doctor_experience_service     = $doctor_experience_service;
    }
    public function createOrUpdateExperience(StoreDoctorExperienceRequest $request)
    {
        $userId = $this->doctor_experience_service->addDoctorExperience($request->all());

        if ($userId) {
            return response()->json([
                'success' => true,
                'message' => 'Experience records updated successfully',
                'user_id' => $userId
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add experience records'
            ], 500);
        }
    }
    public function destroy($id)
    {
        $deleted = $this->doctor_experience_service->deleteDetails($id);

        if ($deleted !== false) {
            return response()->json([
                'success' => true,
                'message' => 'Experience record deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete experience record or record not found'
            ], 404); // Return 404 if record not found or error occurred
        }
    }
    public function createOrUpdateExperienceSingleRecord(Request $request)
    {
        try {
            $addedDoctorExperience = $this->doctor_experience_service->createOrUpdateExperienceSingleRecord($request->all());
            if ($addedDoctorExperience) {
                return response()->json([
                    "status"   => "success",
                    "message" => "Doctor experience details saved!",
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
