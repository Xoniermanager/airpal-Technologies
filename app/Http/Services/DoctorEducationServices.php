<?php
namespace App\Http\Services;
use Carbon\Carbon;
use App\Models\Country;
use Illuminate\Support\Arr;
use App\Models\DoctorEducation;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Http\Repositories\DoctorEducationRepository;

class DoctorEducationServices {
    private  $doctor_education_repository;
    public function __construct(DoctorEducationRepository $doctor_education_repository) {
        $this->doctor_education_repository = $doctor_education_repository;
     }
     public function addDoctorEducation($data)
     {
         $userId = $data['user_id'];
         $payload = [];
     
         foreach ($data['education'] as $education) 
         {
             $payload = [
                 'institute_name'   => $education['name'],
                 'course_id'        => $education['course'],
                 'start_date'       => $education['start_date'],
                 'end_date'         => $education['end_date']
             ];
     
             if (isset($education['certificates'])) 
             {
                 $file = $education['certificates'];
                 $filename = time() . '.' . $file->getClientOriginalExtension();
                 $destinationPath = public_path('images');
                 $file->move($destinationPath, $filename);
                 $payload['certificates'] = $filename;
     
                 // Delete the old certificate if exists
                 $imageUrl = $this->doctor_education_repository
                                  ->where('user_id', $userId)
                                  ->where('course_id', $education['course'])
                                  ->first();
                 if (isset($imageUrl->certificates)) 
                 {
                     $destinationPath = public_path('images/' . $imageUrl->certificates);
                     if (File::exists($destinationPath)) 
                     {
                         unlink($destinationPath);
                     } 
                 }
             }
     
             // Check if the education entry already exists
             $existingEntry = $this->doctor_education_repository
                                  ->where('id',$education['id'] ?? null)
                                  ->where('user_id', $userId)
                                  ->first();
             if ($existingEntry){
                 $existingEntry->update($payload);
             } 
             else{
                 $this->doctor_education_repository->create(array_merge($payload, [
                     'user_id' => $userId
                 ]));
             }
         }
         
         return true;
     }

   public function deleteDetails($id)
   {
    return $this->doctor_education_repository->find($id)->delete();
   }
}
