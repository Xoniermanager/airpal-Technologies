<?php
namespace App\Http\Services;

use App\Http\Repositories\DoctorAddressRepository;

class DoctorAddressServices {
    private  $doctor_Address_repository;
    public function __construct(DoctorAddressRepository $doctor_Address_repository) {
        $this->doctor_Address_repository = $doctor_Address_repository;
     }

    public function addDoctorAddress($data,$userId)
    {
        //dd($userId);
        $payload =
        [
          'address'    => $data['street'],
          'country_id' => $data['country'],
          'state_id'   => $data['states'],
          'city'       => $data['city'],
          'pin_code'   => $data['pincode']
        ];
     return $this->doctor_Address_repository->updateOrCreate(
        ['user_id' => $userId], 
        $payload );
    }


}