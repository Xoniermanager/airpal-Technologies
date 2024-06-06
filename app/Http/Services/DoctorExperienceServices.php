<?php
namespace App\Http\Services;
use App\Models\Country;
use App\Http\Repositories\DoctorExperienceRepository;
use Carbon\Carbon;

class DoctorExperienceServices {
    private  $doctor_experience_service;
    public function __construct(DoctorExperienceRepository $doctor_experience_service) 
    {
      $this->doctor_experience_service = $doctor_experience_service;
    }
     public function addDoctorExperience($data)
     {
        $user_id = $data['user_id'];
        $payload = [];
        $doctor_experience = $data['experience'];
        foreach ($doctor_experience as $experience) 
        {
          $payload = [
            'job_title'       => $experience['job_title'],
            'hospital_id'     => $experience['hospital'],
            'location'        => $experience['location'],
            'start_date'      => Carbon::createFromFormat('d/m/Y', $experience['start_date'])->format('Y-m-d'),
            'end_date'        => Carbon::createFromFormat('d/m/Y', $experience['end_date'])->format('Y-m-d'),
            'job_desription'  => $experience['description']
          ];
          $this->doctor_experience_service->updateOrCreate(['user_id' => $user_id,'hospital_id'=>$experience['hospital']],$payload);
        }
     }
}




?>