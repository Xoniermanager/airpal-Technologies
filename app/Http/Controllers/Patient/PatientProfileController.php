<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientProfileDetailRequest;
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
    public function __construct(
        UserServices $userServices,
        CountryServices $countryServices,
        DoctorAddressServices $doctor_address_services,
        StateServices $stateServices,
    ) {
        $this->userServices    = $userServices;
        $this->countryServices = $countryServices;
        $this->stateServices   = $stateServices;
        $this->doctor_address_services  = $doctor_address_services;
    }

    public function patientSettings()
    {
        $countries   =  $this->countryServices->all();
        $states      =  $this->stateServices->all();

        $patientId = Auth::user()->id;
        $patientDetails = $this->userServices->getPatientById($patientId);
        return view('patients.patient-settings', ['patientDetails' => $patientDetails, 'countries' => $countries, 'states' => $states]);
    }
    public function patientProfile()
    {
        return view('patients.patient-profile');
    }
    public function patientProfileUpdate(PatientProfileDetailRequest $request)
    {
        try {
            $data = $request->all();
            $patientDetails = $this->userServices->updatePatient($data);
            $addedDoctorAddress = $this->doctor_address_services->createOrUpdateAddress($data['address']);

            return response()->json(
                [
                    'message' => 'Patient updated successfully.',
                    'status'  => true,
                    // 'data'      => $patientDetails
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'An error occurred while updating the patient profile.',
                    'status'  => 'false',
                    'error'   => $e->getMessage()
                ],
                500
            );
        }
    }
}
