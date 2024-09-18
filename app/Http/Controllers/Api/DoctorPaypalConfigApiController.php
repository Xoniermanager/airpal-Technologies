<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DoctorPaypalConfigRequest;
use App\Http\Services\DoctorPaypalConfigService;

class DoctorPaypalConfigApiController extends Controller
{
    private  $paypalConfigService;

    public function __construct(DoctorPaypalConfigService $paypalConfigService)
    {
        $this->paypalConfigService = $paypalConfigService;
    }
    public function index()
    {
        try {
            $doctorPaypalConfig  =  $this->paypalConfigService->getPaypalConfigByDoctor(Auth::guard('api')->user()->id);
            if ($doctorPaypalConfig) {
                return response()->json([
                    'success' => true,
                    'message' => 'PayPal configuration saved successfully.',
                    'data'    => $doctorPaypalConfig
                ], 200); // HTTP status code 200 for OK
            }
        } catch (\Exception $e) {
            // Exception handling and error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to save PayPal configuration.',
                'error' => $e->getMessage() // Return the exception message
            ], 500);
        }
    }
    public function store(DoctorPaypalConfigRequest $doctorPaypalConfigRequest)
    {
        try {
            $doctorPaypalConfig = $this->paypalConfigService->storeDoctorPaypalConfigDetail($doctorPaypalConfigRequest->all());
            if ($doctorPaypalConfig) {
                return response()->json([
                    'success' => true,
                    'message' => 'PayPal configuration saved successfully.',
                    'data'    => $doctorPaypalConfig
                ], 200); // HTTP status code 200 for OK
            }
        } catch (\Exception $e) {
            // Exception handling and error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to save PayPal configuration.',
                'error' => $e->getMessage() // Return the exception message
            ], 500); // HTTP status code 500 for server error
        }
    }
}
