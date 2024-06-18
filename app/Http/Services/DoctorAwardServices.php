<?php
namespace App\Http\Services;
use App\Models\Country;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use App\Http\Repositories\DoctorAwardRepository;

class DoctorAwardServices {
    private  $doctor_award_repository;
    public function __construct(DoctorAwardRepository $doctor_award_repository) {
        $this->doctor_award_repository = $doctor_award_repository;
     }

     public function addDoctorAward($data){
        

        $payload = [];
        $userId = $data['user_id'];
        foreach ($data['awards'] as $award) 
        {
          $payload =
          [
              'award_id'        => $award['name'],
              'year'            => $award['year'],
              'description'     => $award['description']
          ];

          if(isset($award['certificates'])) {
            $file = $award['certificates'];
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath, $filename);
            $payload['certificates'] = $filename;

            $imageUrl = $this->doctor_award_repository->where('user_id', $userId)->where('award_id', $award['name'])->first();
            if (isset($imageUrl->certificates)) {
                $destinationPath = public_path('images/' . $imageUrl->certificates);
                if (File::exists($destinationPath)) {
                    unlink($destinationPath);
                } 
            }
          }
          $this->doctor_award_repository->updateOrCreate(['user_id' => $userId , 'award_id' => $award['name']], $payload);
        }
         return true;
       }

   public function deleteDetails($id)
   {
    return $this->doctor_award_repository->find($id)->delete();
   }
}