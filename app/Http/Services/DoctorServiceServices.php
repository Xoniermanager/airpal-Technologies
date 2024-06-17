<?php
namespace App\Http\Services;
use App\Models\State;
use App\Models\Country;
use App\Http\Repositories\ServicesRepository;

class DoctorServiceServices {
    private  $servicesRepository;
    public function __construct(ServicesRepository $servicesRepository) {
        $this->servicesRepository = $servicesRepository;
     }
     public function addService($serviceData)    
     {
      return $this->servicesRepository->create($serviceData);
     }
     public function updateService($updateData , $id){
        return $this->servicesRepository->find($id)->update($updateData);
     }
     public function deleteService($id){
      return $this->servicesRepository->delete($id);
     }

     public function getServicePaginated()
     {
         return $this->servicesRepository->paginate(10)->setPath(route('admin.service.index'));
     } 

     public function getServiceAjaxCall()
     {
         return $this->servicesRepository->all();
     } 
}

