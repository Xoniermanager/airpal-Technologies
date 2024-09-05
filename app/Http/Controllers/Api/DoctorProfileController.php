<?php

namespace App\Http\Controllers\Api;

use App\Models\Award;
use App\Models\Course;
use App\Models\Service;
use App\Models\Hospital;
use App\Models\Language;
use App\Models\DayOfWeek;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\DoctorService;
use App\Http\Services\StateServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CountryServices;
use App\Http\Services\DoctorAddressServices;
use App\Http\Services\DoctorLanguageServices;
use App\Http\Services\SpecializationServices;
use App\Http\Services\DoctorServiceAddServices;
use App\Http\Services\DoctorSpecialityServices;
use App\Http\Requests\StoreDoctorAddressRequest;
use App\Http\Requests\StoreDoctorRegistrationRequest;
use App\Http\Requests\StoreDoctorPersonalDetailRequest;

class DoctorProfileController extends Controller
{
    private $user_services;
    private $doctor_address_services;
    private $doctor_language_services;
    private $specialization_services;
    private $doctor_speciality_services;
    private $doctor_service_add_services;

    private $countryServices;
    private $stateServices;
    private $doctorService;

    public function __construct(
        UserServices $user_services,
        DoctorAddressServices $doctor_address_services,
        CountryServices $countryServices,
        StateServices $stateServices,
        DoctorLanguageServices $doctor_language_services,
        SpecializationServices $specialization_services,
        DoctorSpecialityServices $doctor_speciality_services,
        DoctorServiceAddServices $doctor_service_add_services,
        DoctorService $doctorService
    ) {
        $this->user_services = $user_services;
        $this->countryServices = $countryServices;
        $this->stateServices = $stateServices;
        $this->doctor_address_services  = $doctor_address_services;
        $this->doctor_language_services = $doctor_language_services;
        $this->specialization_services     = $specialization_services;
        $this->doctor_speciality_services  = $doctor_speciality_services;
        $this->doctor_service_add_services = $doctor_service_add_services;
        $this->doctorService   = $doctorService;
    }


    public function profile()
    {
        try {
            if (Auth::guard('api')->user()) {

                $doctor = $this->user_services->getDoctorDataById(Auth::guard('api')->user()->id);
                isset($doctor->doctorAddress) ? $address = $doctor->doctorAddress->toArray() : $address = [];

                $languagesIds = $doctor->language->pluck('id');
                $specialitiesIds = $doctor->specializations->pluck('id');
                $servicesIds = $doctor->services->pluck('id');

                $countries = $this->countryServices->all();
                $states = $this->stateServices->all();

                $specialty  = Specialization::all();
                $services   = Service::all();
                $dayOfWeeks = DayOfWeek::all();
                $languages  = Language::all();
                $hospital   = Hospital::all();
                $awards     = Award::all();
                $course     = Course::all();

                $data = [
                    'doctor'          => $doctor,
                    'address'         => $address,
                    'languagesIds'    => $languagesIds,
                    'specialitiesIds' => $specialitiesIds,
                    'servicesIds'     => $servicesIds,
                    'specialty_list'  => $specialty,
                    'country_list'    => $countries,
                    'services_list'   => $services,
                    'states_list'     => $states,
                    'service_list'    => $services,
                    'dayOfWeeks_list' => $dayOfWeeks,
                    'languages_list'  => $languages,
                    'hospital_list'   => $hospital,
                    'award_list'      => $awards,
                    'course_list'     => $course,

                ];

                return response()->json([
                    'success' => true,
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User is not logged in'
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function createOrUpdate(StoreDoctorPersonalDetailRequest $request)
    {
        try {
            $userData = $request->validated();
            $user = $this->user_services->updateOrCreateDoctor($request->all());
            if ($user) {
                $userId = json_decode($user->content())->id;
                $addedLanguages    = $this->doctor_language_services->addOrUpdateDoctorLanguage($userId, $request->languages);
                $addedSpecialties  = $this->doctor_speciality_services->addOrUpdateDoctorSpecialities($userId, $request->specialities);
                $addedServices     = $this->doctor_service_add_services->addOrUpdateDoctorServices($userId, $request->services);
                if ($addedLanguages && $addedSpecialties && $addedServices) {
                    return response()->json([
                        'success' => true,
                        'message' => "Personal detail Saved Successfully",
                        'status'  => 200
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'failed'
                    ], 500);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function updateAddress(StoreDoctorAddressRequest $request)
    {
        try {
            $addedDoctorAddress = $this->doctor_address_services->createOrUpdateAddress($request->all());
            if ($addedDoctorAddress) {
                return response()->json([
                    "status"  => "success",
                    "message" => "Doctor address details saved!",
                    "data"    => $addedDoctorAddress
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function getMyPatientByDoctorId(Request $request)
    {
        try {
            $finalData = $this->doctorService->getAllPatientByDoctorId(Auth::guard('api')->user()->id, $request->search_key);
            return response()->json([
                "status"  => "success",
                "message" => "Get All Patients",
                "data"    => $finalData
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function doctorRegistration(StoreDoctorRegistrationRequest $request)
    {
        try {
            $user = $this->user_services->updateOrCreateDoctor($request->all());
            if ($user) {
                    return response()->json([
                        'success' => true,
                        'message' => "Personal detail Saved Successfully",
                        'status'  => 200
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'failed'
                    ], 500);
                }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        
    }
}
