<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SpeciliazationRepository;
use App\Http\Services\SpecializationServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Specialization;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use App\Http\Requests\{StoreSpecialitiesRequest,UpdateSpecialitiesRequest};

class SpecialityController extends Controller
{
  private  $specialiation_services;
  //
  public function __construct(SpecializationServices $specialiation_services) {
      $this->specialiation_services = $specialiation_services;
   }
public function speciality()
{
  $specialities = $this->specialiation_services->getSpecialityPaginated();
  return view('admin.speciality.index', compact('specialities'));
}

 // add specialties data 
 public function addSpeciality(StoreSpecialitiesRequest $storeSpecialitiesRequest){
  if ($this->specialiation_services->addSpeciality($storeSpecialitiesRequest)) {
    return response()->json([
        'message'  => 'Added Successfully!',
        'data'     =>  view('admin.speciality.speciality-list', [
          'specialities'   =>  $this->specialiation_services->getSpecialityPaginated()
        ])->render()
    ]);
}
}

// update specialities data 
public function updateSpeciality(UpdateSpecialitiesRequest $updateSpecialitiesRequest){
  if ($this->specialiation_services->updateSpeciality($updateSpecialitiesRequest)) {
    return response()->json([
        'message' => 'Edit Successfully!',
        'data'   =>  view('admin.speciality.speciality-list', [
          'specialities' =>  $this->specialiation_services->getSpecialityPaginated()
        ])->render()
    ]);
  }
}
// delete specialities by id 
public function deleteSpecialities(Specialization $specialization ,$id){
  // dd($id);
    if ($this->specialiation_services->deleteSpeciality($id)) {
      return response()->json([
            'message'        =>  'Edit Successfully!',
            'data'           =>  view('admin.speciality.speciality-list', [
            'specialities'   =>  $this->specialiation_services->getSpecialityPaginated()
          ])->render()
      ]);
    }
  }

public function getSpecialitiesAjaxCall()
{
  $specialities = $this->specialiation_services->getSpecialitiesAjaxCall();
  return json_encode($specialities);
}

public function storeSpecialityByAjaxCall(Request $request)
{
    $data =  json_decode($request->all()['models'])[0];
   return $this->specialiation_services->StoreSpecialitiesByAjaxCall(['name'=> $data->name ]);

}


}
