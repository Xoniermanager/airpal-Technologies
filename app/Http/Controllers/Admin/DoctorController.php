<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Mail\WelcomeMailForDoctor;
use App\Http\Controllers\Controller;
use App\Models\{Service, DayOfWeek};
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreDoctorPersonalDetailRequest;
use App\Http\Services\{BookingServices, CountryServices, UserServices, DoctorLanguageServices, SpecializationServices, DoctorSpecialityServices, DoctorServiceAddServices, StateServices};

class DoctorController extends Controller
{
    private $user_services;
    private $doctor_language_services;
    private $specialization_services;
    private $doctor_speciality_services;
    private $doctor_service_add_services;
    private $countryServices;
    private $stateServices; 
    private $bookingServices;

    public function __construct(
        UserServices $user_services,
        DoctorLanguageServices $doctor_language_services,
        SpecializationServices $specialization_services,
        DoctorSpecialityServices $doctor_speciality_services,
        DoctorServiceAddServices $doctor_service_add_services,
        CountryServices $countryServices,
        StateServices $stateServices,
        BookingServices $bookingServices
        
    ) {
        $this->user_services               = $user_services;
        $this->countryServices             = $countryServices;
        $this->stateServices               = $stateServices; 
        $this->doctor_language_services    = $doctor_language_services;
        $this->specialization_services     = $specialization_services;
        $this->doctor_speciality_services  = $doctor_speciality_services;
        $this->doctor_service_add_services = $doctor_service_add_services;
        $this->bookingServices            = $bookingServices;
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
                    $userName = json_decode($user->content())->data->first_name;
                    if(json_decode($user->content())->data->role == 2)
                    {
                        $userCreated = json_decode($user->content())->data;
                        Mail::to($request->email)->send(new WelcomeMailForDoctor($userName));
                    }

                    if ($addedLanguages && $addedSpecialties && $addedServices) {
                        // return  json_decode($user->content());
                        return response()->json([
                            "success"      => true,
                            "redirect_url" => route('login.index'),
                            "message" => "Doctor successfully registered!"
                          ]);
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


    public function searching(Request $request)
    {
        $filtered  = $this->user_services->searchDoctors($request->all());
        return response()->json([
            'message' => 'Retrieved Successfully!',
            'data'   =>  view('admin.doctor-profile.doctor-list', [
              'doctors' =>  $filtered
            ])->render()
        ]);
    }

    /**
     * Get doctor profile status html to update the profile update progress
     */
    public function getDoctorProfileProgressHtml(Request $request)
    {
        
        $data = Validator::make($request->all(),[
            'doctor_id'     =>  'required|exists:users,id,role,2'
        ]);

        $profileStatusHTML = '';
        $status = false;
            
        $profileCompleteStatus = checkDoctorProfileCompleteStatus($request->doctor_id);
        if($profileCompleteStatus)
        {
            $profileStatusHTML = createDoctorProfileStatus($profileCompleteStatus);
            $status = true;
        }
            
        
        return [
            'status'    =>  $status,
            'html'      =>  $profileStatusHTML
        ];
    }
}
