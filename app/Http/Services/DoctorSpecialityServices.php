<?php
namespace App\Http\Services;
use App\Models\Country;
use App\Http\Repositories\DoctorSpecialityRepository;

class DoctorSpecialityServices {
    private  $doctor_speciality_repository;
    public function __construct(DoctorSpecialityRepository $doctor_speciality_repository) {
        $this->doctor_speciality_repository = $doctor_speciality_repository;
     }

     public function addDoctorSpecialities($userId,$specialitiesIds)
     {
       foreach ($specialitiesIds as  $specialitiesId)
        {
          $specialitiesData = 
          [
              'user_id'       => $userId,
              'speciality_id' => $specialitiesId,
          ];
          return  $this->doctor_speciality_repository->create($specialitiesData);
        }
     }

}




?>