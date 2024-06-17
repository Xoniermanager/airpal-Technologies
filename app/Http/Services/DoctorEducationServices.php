<?php
namespace App\Http\Services;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Support\Arr;
use App\Http\Repositories\DoctorEducationRepository;

class DoctorEducationServices {
    private  $doctor_education_repository;
    public function __construct(DoctorEducationRepository $doctor_education_repository) {
        $this->doctor_education_repository = $doctor_education_repository;
     }
     public function addDoctorEducation($data){

      $userId = $data['user_id'];
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
        $this->doctor_education_repository->updateOrCreate(['user_id'   => $userId,
                                                            'course_id' => $education['course']],
                                                            $payload );
      }

       return true;
     }


   public function deleteDetails($id)
   {
    return $this->doctor_education_repository->find($id)->delete();
   }
}
