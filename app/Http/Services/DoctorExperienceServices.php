<?php
namespace App\Http\Services;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Support\Arr;
use App\Http\Repositories\DoctorExperienceRepository;

class DoctorExperienceServices {
    private  $doctor_experience_repository;
    public function __construct(DoctorExperienceRepository $doctor_experience_repository) 
    {
      $this->doctor_experience_repository = $doctor_experience_repository;
    }

    public function addDoctorExperience($data){

      $payload = [];
      foreach ($data['experience'] as $experience) 
      {
        $payload =
        [
            'job_title'       =>  $experience['job_title'],
            'hospital_id'     =>  $experience['hospital'],
            'location'        =>  $experience['location'],
            'start_date'      =>  $experience['start_date'],
            'end_date'        =>  $experience['end_date'] ,
            'job_desription'  =>  $experience['description']
        ];

        $this->doctor_experience_repository->updateOrCreate(['user_id' => $data['user_id'],
                                                            'hospital_id' => $experience['hospital']],
                                                            $payload);
      }

       return true;
     }
   public function deleteDetails($id)
   {
    return $this->doctor_experience_repository->find($id)->delete();
   }
}




?>