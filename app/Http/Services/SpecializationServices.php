<?php
namespace App\Http\Services;
use App\Models\Specialization;
use App\Http\Repositories\SpeciliazationRepository;
use Illuminate\Support\Facades\File;

class SpecializationServices 
{
    private  $SpeciliazationRepository;
    public function __construct(SpeciliazationRepository $SpeciliazationRepository) {
        $this->SpeciliazationRepository = $SpeciliazationRepository;
     }
    public function addSpeciality($storeSpecialitiesRequest)
    {
      try {
        $data['name']= $storeSpecialitiesRequest->name;
        $data['description']= $storeSpecialitiesRequest->description;
        
        if($storeSpecialitiesRequest->hasFile('image') && !empty($storeSpecialitiesRequest->image)){
          $data['image_url'] = uploadingImageorFile($storeSpecialitiesRequest->image, 'specialties', $storeSpecialitiesRequest->name);
        }
        dd( $data);
        return  $this->SpeciliazationRepository->create($data);
      } catch (\Throwable $th) {
        //throw $th;
      }
    }
    public function updateSpeciality($updateSpecialitiesRequest){
      try {
        $imageUrl = Specialization::find($updateSpecialitiesRequest->id)->image_url;
        $destinationPath = public_path('admin/specialization_image/') . $imageUrl; 

      if($updateSpecialitiesRequest->hasFile('image') && !empty($updateSpecialitiesRequest->image)){
        $data['image_url'] = uploadingImageorFile($updateSpecialitiesRequest->image,'specialties',$updateSpecialitiesRequest->name);
      }

      $data['name'] = $updateSpecialitiesRequest->name;
      $data['description']=$updateSpecialitiesRequest->description;
      return $this->SpeciliazationRepository->find($updateSpecialitiesRequest->id)->update($data);
      } catch (\Exception $e) {
         
      }
    }

    public function deleteSpeciality($id){
      $imageUrl = Specialization::find($id)->image_url;
      // dd($imageUrl);
      $destinationPath = public_path('admin/specialization_image/') . $imageUrl; 
      if (File::exists($destinationPath)) {
        File::delete($destinationPath);
      } 
      return $this->SpeciliazationRepository->delete($id);
    }
   
    public function getSpecialityPaginated()
    {
        return $this->SpeciliazationRepository->paginate(10)->setPath(route('admin.speciality.index'));
    } 
    public function all()
    {
        return $this->SpeciliazationRepository->all();
    } 

    public function getSpecialitiesAjaxCall()
    {
        return $this->SpeciliazationRepository->all();
    } 
    public function StoreSpecialitiesByAjaxCall($data)
    {
        return  $this->SpeciliazationRepository->create($data);
    } 

    public function getSpecialtyByID($id)
    {
      return $this->SpeciliazationRepository->find($id);
    }
}

