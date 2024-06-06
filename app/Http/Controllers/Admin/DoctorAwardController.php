<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDoctorAwardRequest;
use App\Http\Services\DoctorAwardServices;
class DoctorAwardController extends Controller
{
    //
    private $doctor_award_services;
    public function __construct(DoctorAwardServices $doctor_award_services,)
    {
        $this->doctor_award_services     = $doctor_award_services;
    }
    public function addDoctorAward(StoreDoctorAwardRequest $request)
    {
        // dd($request->validated());
        $userId = $this->doctor_award_services->addDoctorAward($request->validated());

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
}
