<?php

namespace App\Models\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\DoctorServiceAddServices;
use App\Http\Services\DoctorSpecialityServices;
use App\Http\Requests\StoreDoctorServiceDetailRequest;

class DoctorServiceController extends Controller
{
    private $doctor_speciality_services;
    private $doctor_service_add_services;

    public function __construct(DoctorSpecialityServices $doctor_speciality_services, DoctorServiceAddServices $doctor_service_add_services)
    {
        $this->doctor_speciality_services  = $doctor_speciality_services;
        $this->doctor_service_add_services = $doctor_service_add_services;
    }
    public function addDoctorServiceSpecialities(StoreDoctorServiceDetailRequest $request)
    {
        try {
            $request->validated();
            $addedSpecialties  = $this->doctor_speciality_services->addOrUpdateDoctorSpecialities($request->user_id, $request->specialities);
            $addedServices     = $this->doctor_service_add_services->addOrUpdateDoctorServices($request->user_id, $request->services);
            if (Auth::user()->role == 2) {
                $url = route('doctor.doctor-profile.index');
            }
            if ($addedSpecialties && $addedServices) {
                return response()->json([
                    "status"      => true,
                    "message" => "Doctor successfully registered!",
                    "redirect_url" => $url ?? route('admin.index.doctors'),
                ]);
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return  $e->getMessage();
        }
    }
}