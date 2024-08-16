<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Models\{Service, DayOfWeek};
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\StoreDoctorPersonalDetailRequest;
use App\Http\Services\{CountryServices, UserServices, DoctorLanguageServices, SpecializationServices, DoctorSpecialityServices, DoctorServiceAddServices, StateServices};

class DoctorController extends Controller
{
    private $user_services;
    private $doctor_language_services;
    private $specialization_services;
    private $doctor_speciality_services;
    private $doctor_service_add_services;

    private $countryServices;
    private $stateServices; 

    public function __construct(
        UserServices $user_services,
        DoctorLanguageServices $doctor_language_services,
        SpecializationServices $specialization_services,
        DoctorSpecialityServices $doctor_speciality_services,
        DoctorServiceAddServices $doctor_service_add_services,
        CountryServices $countryServices,
        StateServices $stateServices,
        
    ) {
        $this->user_services               = $user_services;
        $this->countryServices             = $countryServices;
        $this->stateServices               = $stateServices; 
        $this->doctor_language_services    = $doctor_language_services;
        $this->specialization_services     = $specialization_services;
        $this->doctor_speciality_services  = $doctor_speciality_services;
        $this->doctor_service_add_services = $doctor_service_add_services;
    }
    public function index()
    {
        $doctors = $this->user_services->getDoctorDataForAdmin();
        return view('admin.doctor-profile.index')->with('doctors', $doctors);
    }


    public function addDoctor()
    {
        $speciality  =  Specialization::all();
        $services    =  Service::all();
        $dayOfWeeks  =  DayOfWeek::all();
        $countries   =  $this->countryServices->all();
        $states      =  $this->stateServices->all();
        
        return view('admin.doctor-profile.add-doctor',[
                        'specialities'=> $speciality,
                        'services'    => $services,
                        'countries'   => $countries,
                        'states'      => $states,
                        'dayOfWeeks'  => $dayOfWeeks ]);
    }
    public function addPersonalDetails(StoreDoctorPersonalDetailRequest $request)
    {

        try {
                $userData = $request->validated();
                $user = $this->user_services->updateOrCreateDoctor($userData);

                if ($user) {
                    $userId = json_decode($user->content())->id;
                    $addedLanguages    = $this->doctor_language_services->addOrUpdateDoctorLanguage($userId, $request->languages);
                    $addedSpecialties  = $this->doctor_speciality_services->addOrUpdateDoctorSpecialities($userId, $request->specialities);
                    $addedServices     = $this->doctor_service_add_services->addOrUpdateDoctorServices($userId, $request->services);
                    if ($addedLanguages && $addedSpecialties && $addedServices) {
                        return  json_decode($user->content());
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
        $languagesIds = $singleDoctorDetails->language->pluck('id');
        $specialitiesIds = $singleDoctorDetails->specializations->pluck('id');
        $servicesIds = $singleDoctorDetails->services->pluck('id');

        $countries = $this->countryServices->all();
        $states = $this->stateServices->all();
        
        $speciality = Specialization::all();
        $services   = Service::all();
        $dayOfWeeks = DayOfWeek::all();

        return view('admin.doctor-profile.add-doctor', [
            'specialities'    => $speciality,
            'languagesIds'    => $languagesIds,
            'specialitiesIds' => $specialitiesIds,
            'servicesIds' => $servicesIds,
            'services'    => $services,
            'countries'   => $countries,
            'states'      => $states,
            'dayOfWeeks'  => $dayOfWeeks,
            'singleDoctorDetails' => $singleDoctorDetails,
        ]);
    }
}
