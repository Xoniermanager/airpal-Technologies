<?php
namespace App\Http\Services;
use App\Models\Country;
use App\Http\Repositories\CountryRepository;

class CountryServices {
    private  $CountryRepository;
    public function __construct(CountryRepository $CountryRepository) {
        $this->CountryRepository = $CountryRepository;
     }
     public function addCountry($data){
        return $this->CountryRepository->create($data);
     }
     public function updateCountry($data , $id){
      // dd($data);
        return $this->CountryRepository->find($id)->update($data);
     }
     public function countryDelete($id){
        return $this->CountryRepository->find($id)->delete();
     }

     public function getPaginateData(){
      return $this->CountryRepository->paginate(10)->setPath(route('admin.index.country'));
     }
}




?>