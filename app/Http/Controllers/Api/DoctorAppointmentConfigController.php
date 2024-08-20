<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\DoctorAppointmentConfigService;

class DoctorAppointmentConfigController extends Controller
{
    public $doctorAppointmentConfigService;

    public function __construct(DoctorAppointmentConfigService $doctorAppointmentConfigService)
    {
        $this->doctorAppointmentConfigService = $doctorAppointmentConfigService;
    }

    public function getAppointmentConfig()
    {
        try {
            $allAppointmentConfigDetails = $this->doctorAppointmentConfigService->getSlotsBySlotId(Auth::guard('api')->user()->id);
            return response()->json([
                'status' => true,
                'message' => "Retrieved All Appointment Config",
                'data' => $allAppointmentConfigDetails
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => false,
                "error" =>  $e->getMessage(),
                "message" => "Unable to find Appointment Config"
            ], 500);
        }
    }
}
