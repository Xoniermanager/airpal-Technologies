<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\{Service, DayOfWeek};
use App\Http\Requests\StoreDoctorPersonalDetailRequest;
use App\Http\Requests\{StoreDoctorExperienceRequest, StoreDoctorAwardRequest};
use App\Http\Services\{UserServices, DoctorLanguageServices, SpecializationServices, DoctorSpecialityServices, DoctorServiceAddServices};
use Illuminate\Support\Facades\Redis;

class DoctorController extends Controller
{
    private $user_services;
    private $doctor_language_services;
    private $specialization_services;
    private $doctor_speciality_services;
    private $doctor_service_add_services;

    public function __construct(
        UserServices $user_services,
        DoctorLanguageServices $doctor_language_services,
        SpecializationServices $specialization_services,
        DoctorSpecialityServices $doctor_speciality_services,
        DoctorServiceAddServices $doctor_service_add_services,
    ) {
        $this->user_services                = $user_services;
        $this->doctor_language_services     = $doctor_language_services;
        $this->specialization_services      = $specialization_services;
        $this->doctor_speciality_services   = $doctor_speciality_services;
        $this->doctor_service_add_services  = $doctor_service_add_services;
    }
    public function index()
    {
        $doctors = $this->user_services->getDoctorDataForAdmin();
        // dd($doctors);
        return view('admin.doctor-profile.index')->with('doctors', $doctors);
    }


    public function addDoctor()
    {
        $speciality = Specialization::all();
        $services   = Service::all();
        $dayOfWeeks = DayOfWeek::all();
        return view('admin.doctor-profile.add-doctor')
            ->with('specialities', $speciality)
            ->with('services', $services)
            ->with('dayOfWeeks', $dayOfWeeks);
    }
    public function addPersonalDetails(StoreDoctorPersonalDetailRequest $request)
    {
        // dd($request->all());
        try {
            if ($userId = $this->user_services->addDoctorPersonalDetails($request->validated())) {
                $languagesAdded = $this->doctor_language_services->addDoctorLanguage($userId, $request->name);
                $specialitiesAdded = $this->doctor_speciality_services->addDoctorSpecialities($userId, $request->specialities);
                $servicesAdded = $this->doctor_service_add_services->addDoctorServices($userId, $request->service);

                if ($languagesAdded && $specialitiesAdded && $servicesAdded) {
                    return $userId;
                } else {
                    return 0;
                }
            }
        } catch (\Exception $e) {
            return  $e->getMessage();
        }
    }

    public function editDoctor(Request $request ,$id)
    {

        $singleDoctorDetails = $this->user_services->getDoctorDataById($id);
        // dd($singleDoctorDetails);
        $speciality = Specialization::all();
        $services   = Service::all();
        $dayOfWeeks = DayOfWeek::all();
        return view('admin.doctor-profile.add-doctor')
            ->with('specialities', $speciality)
            ->with('services', $services)
            ->with('dayOfWeeks', $dayOfWeeks)
            ->with('singleDoctorDetails', $singleDoctorDetails);
    }
}
