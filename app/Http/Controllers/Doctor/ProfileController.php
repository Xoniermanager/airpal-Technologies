<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Service;
use App\Models\DayOfWeek;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Services\StateServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use App\Http\Services\CountryServices;

class ProfileController extends Controller
{
    private $user_services;
    private $doctorDetails;
    private $countryServices;
    private $stateServices;

    public function __construct(UserServices $user_services, CountryServices $countryServices, StateServices $stateServices,)
    {
        $this->countryServices = $countryServices;
        $this->stateServices   = $stateServices;
        $this->user_services   = $user_services;
    }

    public function doctorProfile()
    {
        $singleDoctorDetails = $this->user_services->getDoctorDataById(auth::id());
        $languagesIds        = $singleDoctorDetails->language->pluck('id');
        $specialitiesIds     = $singleDoctorDetails->specializations->pluck('id');
        $servicesIds         = $singleDoctorDetails->services->pluck('id');

        $countries  = $this->countryServices->all();
        $states     = $this->stateServices->all();

        $specialty  = Specialization::all();
        $services   = Service::all();
        $dayOfWeeks = DayOfWeek::all();

        return view('doctor.profile.doctor-profile', [
            'specialities'    => $specialty,
            'languagesIds'    => $languagesIds,
            'specialitiesIds' => $specialitiesIds,
            'servicesIds' => $servicesIds,
            'services'    => $services,
            'countries'   => $countries,
            'states'      => $states,
            'dayOfWeeks'  => $dayOfWeeks,
            'singleDoctorDetails' => $singleDoctorDetails,
            // 'doctorDetails' => $singleDoctorDetails
        ]);
    }
}
