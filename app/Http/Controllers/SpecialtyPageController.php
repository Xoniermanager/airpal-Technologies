<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SpecializationServices;
use App\Http\Services\DoctorSpecialityServices;
use App\Http\Repositories\SpeciliazationRepository;

class SpecialtyPageController extends Controller
{

    private $doctor_specialty;
    private  $speciliazationServices;

    public function __construct(DoctorSpecialityServices $doctor_specialty,SpecializationServices $speciliazationServices) {

        $this->doctor_specialty = $doctor_specialty;
        $this->speciliazationServices = $speciliazationServices;
        
     }
    public function specialty_list()
    {
        $specialtiesByDoctorsCount =    $this->speciliazationServices->all();
        return view('website.pages.specialties_list',['specialties' => $specialtiesByDoctorsCount ]);
    }
    
    public function specialty_detail($id)
    {
        $doctorListBySpecialtyID   =   $this->doctor_specialty->doctorListBySpecialtyID($id);
        $specialtiesByDoctorsCount =    $this->speciliazationServices->all();

        $specialty =  $this->speciliazationServices->getSpecialtyByID($id);
        return view('website.pages.specialty_detail',
                    ['specialty'=>$specialty ,
                    'specialties'=>$specialtiesByDoctorsCount, 
                    'doctorLists'=> $doctorListBySpecialtyID
                ]);
    }
  
}
