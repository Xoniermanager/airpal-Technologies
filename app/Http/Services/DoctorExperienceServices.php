<?php
namespace App\Http\Services;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use App\Http\Repositories\DoctorExperienceRepository;

class DoctorExperienceServices {
    private  $doctor_experience_repository;
    public function __construct(DoctorExperienceRepository $doctor_experience_repository) 
    {
      $this->doctor_experience_repository = $doctor_experience_repository;
    }

    public function addDoctorExperience($data){
      $payload = [];
      $userId = $data['user_id'];
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

        if(isset($experience['certificates'])) {
          $file = $experience['certificates'];
          $filename = time() . '.' . $file->getClientOriginalExtension();
          $destinationPath = public_path('images');
          $file->move($destinationPath, $filename);
          $payload['certificates'] = $filename;

          $imageUrl = $this->doctor_experience_repository->where('user_id', $userId)->where('hospital_id', $experience['hospital'])->first();
          if (isset($imageUrl->certificates)) {
              $destinationPath = public_path('images/' . $imageUrl->certificates);
              if (File::exists($destinationPath)) {
                  unlink($destinationPath);
              } 
          }
        }

        $this->doctor_experience_repository->updateOrCreate(['user_id' => $userId,
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