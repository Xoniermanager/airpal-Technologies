<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Models\Hospital;
use App\Models\Language;
use App\Models\DayOfWeek;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\StateServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CountryServices;
use App\Http\Services\DoctorAddressServices;
use App\Http\Requests\StoreDoctorAddressRequest;
use App\Http\Requests\StoreDoctorPersonalDetailRequest;
use App\Models\Award;
use App\Models\Course;

class DoctorProfileController extends Controller
{
    private $user_services;
    private $doctor_address_services;

    private $countryServices;
    private $stateServices; 

    public function __construct(UserServices $user_services ,
                                DoctorAddressServices $doctor_address_services,
                                CountryServices $countryServices,
                                StateServices $stateServices
                                )
    {
        $this->user_services = $user_services;
        $this->countryServices= $countryServices;
        $this->stateServices = $stateServices; 
        $this->doctor_address_services  = $doctor_address_services;
    }


    public function profile()
    {
        try {
            if(Auth::guard('doctor_api')->user()){

                $doctor = $this->user_services->getDoctorDataById(Auth::guard('doctor_api')->user()->id);
                $address = $doctor->doctorAddress->toArray();
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
                    'address'         =>$address,
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
            }else
            {
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
            $doctors = $this->user_services->updateOrCreateDoctor($request->all());
            return response()->json($doctors);
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
            $addedDoctorAddress = $this->doctor_address_services->addDoctorAddress($request->all());
            if ($addedDoctorAddress)
            {
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
    
}
