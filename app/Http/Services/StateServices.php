<?php
namespace App\Http\Services;
use App\Models\State;
use App\Models\Country;
use App\Http\Repositories\StateRepository;

class StateServices {
    private  $stateRepository;
    public function __construct(StateRepository $stateRepository) {
        $this->stateRepository = $stateRepository;
     }
     public function addState($stateData)    
     {
      return $this->stateRepository->create($stateData);
     }
     public function updateCountry($updateData , $id){
        return $this->stateRepository->find($id)->update($updateData);
     }
     public function deleteState($id){
      return $this->stateRepository->delete($id);
     }

     public function getStatesPaginated()
     {
         return $this->stateRepository->with('country')->paginate(10)->setPath(route('admin.index.state'));
     } 
}




?>