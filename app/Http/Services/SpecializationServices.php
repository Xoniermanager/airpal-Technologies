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
        
        if($storeSpecialitiesRequest->hasFile('image')){
          $file = $storeSpecialitiesRequest->file('image');
          $filename = time() . '.' . $file->getClientOriginalExtension();
          $destinationPath = public_path('admin/specialization_image'); 
          $file->move($destinationPath, $filename);
          $data['image_url'] = $filename;
        }
        return  $this->SpeciliazationRepository->create($data);
      } catch (\Throwable $th) {
        //throw $th;
      }
    }
    public function updateSpeciality($updateSpecialitiesRequest){
        // dd($updateSpecialitiesRequest);
      try {
        $imageUrl = Specialization::find($updateSpecialitiesRequest->id)->image_url;
        $destinationPath = public_path('admin/specialization_image/') . $imageUrl; 
      if($updateSpecialitiesRequest->hasFile('image')){
          if (File::exists($destinationPath)) {
            File::delete($destinationPath);
          } 
          $image = $updateSpecialitiesRequest->file('image');
          $imageName = time() . '.' . $image->getClientOriginalExtension();  
          $image->move(public_path('admin/specialization_image'), $imageName);
          $data['image_url'] = $imageName;
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

}

