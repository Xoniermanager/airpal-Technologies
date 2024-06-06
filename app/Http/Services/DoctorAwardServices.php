<?php
namespace App\Http\Services;
use App\Models\Country;
use App\Http\Repositories\DoctorAwardRepository;

class DoctorAwardServices {
    private  $doctor_award_repository;
    public function __construct(DoctorAwardRepository $doctor_award_repository) {
        $this->doctor_award_repository = $doctor_award_repository;
     }
     public function addDoctorAward($data){
      //   return $this->doctor_award_repository->create($data);


        
      $user_id = $data['user_id'];

      for ($i = 0; $i < count($data['job_title']); $i++) {
          $this->doctor_award_repository->create([
              'award_id'        => $data['name'][$i],
              'user_id'         => $user_id,
              'year'            => $data['year'][$i],
              'description'     => $data['description'][$i]
          ]);
      }  
      return $user_id;


     }
   
}




?>