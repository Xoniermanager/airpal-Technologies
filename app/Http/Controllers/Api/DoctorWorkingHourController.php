<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorWorkingHourServices;
use App\Http\Requests\StoreDoctorWorkingHourRequest;

class DoctorWorkingHourController extends Controller
{
    private $doctor_working_hour_services;
    public function __construct(DoctorWorkingHourServices $doctor_working_hour_services)
    {
        $this->doctor_working_hour_services = $doctor_working_hour_services;
    }
    public function createOrUpdateWorkingHour(StoreDoctorWorkingHourRequest $request)
    {
        // return ($request->validated());
        $userId = $request->user_id;
        $insertWorkigHour = $this->doctor_working_hour_services->addDoctorWorkingHour($request->validated(),  $userId);

        // return $insertWorkigHour;

        if ($insertWorkigHour) {
            return response()->json([
                'success' => true,
                'message' => 'Working hour Updated successfully',
                'user_id' => $userId
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Working hour'
            ], 500);
        }
    }
}
