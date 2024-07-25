<?php

namespace App\Http\Controllers\Api\Patient;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\StateServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CountryServices;
use App\Http\Services\DoctorAddressServices;
use App\Http\Requests\StoreDoctorPersonalDetailRequest;

class PatientProfileController extends Controller
{
    private $userServices;
    private $countryServices;
    private $stateServices; 
    private $doctor_address_services;
    public function __construct(UserServices $userServices , CountryServices $countryServices,
    StateServices $stateServices,    DoctorAddressServices $doctor_address_services,)
    {
        $this->userServices    = $userServices;
        $this->countryServices = $countryServices;
        $this->stateServices   = $stateServices; 
        $this->doctor_address_services = $doctor_address_services;

    }
    public function patientProfile()
    {
        try {
        $countries      =  $this->countryServices->all();
        $states         =  $this->stateServices->all();
        $patientDetails =  $this->userServices->getPatientById(9);
     
        $data = [
        'states'         => $states,
        'countries'      => $countries,
        'patientDetails' => $patientDetails,
        'patientAddress' => $patientDetails->patientAddress
        ];
        if ($data) {
            return response()->json([
              "status"  => "success",
              "message" => "",
              "data"    => $data
            ]);
          }
        } catch (\Throwable $th) {
          return response()->json([
            'success' => false,
            'message' => $th->getMessage()
          ], 500);
        }
    }
    public function updateProfile(StoreDoctorPersonalDetailRequest $request)
    {
        try {
            $data = $request->all();
            $patientDetails     = $this->userServices->updatePatient($data);
            $addedDoctorAddress = $this->doctor_address_services->createOrUpdateAddress($data['address']);
            if($patientDetails && $addedDoctorAddress)
            {
            return response()->json(
                [
                    'message' => 'Patient updated successfully.',
                    'status'  => true,
                ]
            );
        }
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'An error occurred while updating the patient profile.',
                    'status'  => 'false',
                    'error'   => $e->getMessage()
                ], 500
            );
        }
    }
}
