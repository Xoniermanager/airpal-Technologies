<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\StateServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CountryServices;
use App\Http\Services\DoctorAddressServices;
use App\Http\Requests\PatientProfileDetailRequest;
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
        $data = $request->all();
        $data['doctor_id'] = Auth::id();

        try {
            DB::beginTransaction(); // Start the transaction
            $this->userServices->updatePatient($data);
            $this->doctor_address_services->createOrUpdateAddress($data['address']);
            DB::commit(); // Commit the transaction

            return response()->json(
                [
                    'message' => 'Patient updated successfully.',
                    'status'  => true,
                ]
            );
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction if an error occurs
            return response()->json(
                [
                    'message' => 'An error occurred while updating the patient profile.',
                    'status'  => false,
                    'error'   => $e->getMessage()
                ],
                500
            );
        }
    }
}
