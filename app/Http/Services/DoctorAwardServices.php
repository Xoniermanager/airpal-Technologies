<?php
namespace App\Http\Services;
use App\Models\Country;
use Illuminate\Support\Arr;
use App\Http\Repositories\DoctorAwardRepository;

class DoctorAwardServices {
    private  $doctor_award_repository;
    public function __construct(DoctorAwardRepository $doctor_award_repository) {
        $this->doctor_award_repository = $doctor_award_repository;
     }

     public function addDoctorAward($data){
        

        $payload = [];
        $userId = $data['user_id'];
        foreach ($data['awards'] as $data) 
        {
          $payload =
          [
              'award_id'        => $data['name'],
              'year'            => $data['year'],
              'description'     => $data['description']
          ];
          $this->doctor_award_repository->updateOrCreate(['user_id' => $userId , 'award_id' => $data['name']], $payload);
        }
         return true;
       }

   public function deleteDetails($id)
   {
    return $this->doctor_award_repository->find($id)->delete();
   }
}