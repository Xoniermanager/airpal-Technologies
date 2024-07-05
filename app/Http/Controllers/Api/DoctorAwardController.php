<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorAwardServices;
use App\Http\Requests\StoreDoctorAwardRequest;

class DoctorAwardController extends Controller
{
    
    private $doctor_award_services;
    public function __construct(DoctorAwardServices $doctor_award_services,)
    {
        $this->doctor_award_services  = $doctor_award_services;
    }
    public function createOrUpdateAward(StoreDoctorAwardRequest $request)
    {
        $userId = $this->doctor_award_services->addDoctorAward($request->all());

        if ($userId) {
            return response()->json([
                'success' => true,
                'message' => 'Award records added successfully',
                'user_id' => $userId
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Award records'
            ], 500);
        }
    }

    public function destroy($id)
    {
        if ($this->doctor_award_services->deleteDetails($id)) {
            return response()->json([
                'success' => true,
                'message' => 'Experience records deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add experience records'
            ], 500);
        }
    }
}
