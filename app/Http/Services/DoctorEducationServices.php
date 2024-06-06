<?php
namespace App\Http\Services;
use App\Models\Country;
use App\Http\Repositories\DoctorEducationRepository;
use Carbon\Carbon;

class DoctorEducationServices {
    private  $doctor_education_repository;
    public function __construct(DoctorEducationRepository $doctor_education_repository) {
        $this->doctor_education_repository = $doctor_education_repository;
     }
     public function addDoctorEducation($data){
      // $user_id = $data['user_id'];
      // dd($data);
      $user_id = 2;
      $payload = [];
      foreach ($data['education'] as $education) 
      {
        $payload =
        [
          'institute_name'   => $education['name'],
          'course_id'        => $education['course'],
          'start_date'       => $education['start_date'],
          'end_date'         => $education['end_date']
        ];
        $this->doctor_education_repository->updateOrCreate(['user_id' => $user_id,'course_id' => $education['course']],$payload);
      }

      // return true;
     }
}
?>