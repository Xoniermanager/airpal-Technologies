<?php

namespace App\Http\Services;

use App\Http\Repositories\DoctorAddressRepository;

class DoctorAddressServices
{
    private  $doctor_Address_repository;
    public function __construct(DoctorAddressRepository $doctor_Address_repository)
    {
        $this->doctor_Address_repository = $doctor_Address_repository;
    }

    
    public function createOrUpdateAddress($data)
    {
        $payload =
            [
                'address'    => $data['street'],
                'country_id' => $data['country'],
                'state_id'   => $data['states'],
                'city'       => $data['city'],
                'pin_code'   => $data['pincode']
            ];
        return $this->doctor_Address_repository->updateOrCreate(
            ['user_id' => $data['user_id']],
            $payload
        );
    }

    // public function addDoctorAddress($data)
    // {
    //     $payload =
    //         [
    //             'address'    => $data['street'],
    //             'country_id' => $data['country'],
    //             'state_id'   => $data['states'],
    //             'city'       => $data['city'],
    //             'pin_code'   => $data['pincode']
    //         ];
    //     return $this->doctor_Address_repository->updateOrCreate(
    //         ['user_id' => $data['user_id']],
    //         $payload
    //     );
    // }

    // public function addPatientAddress($data)
    // {
    //     $payload =
    //         [
    //             'address'    => $data['address'],
    //             'country_id' => $data['country'],
    //             'state_id'   => $data['states'],
    //             'city'       => $data['city'],
    //             'pin_code'   => $data['pin_code']
    //         ];

    //     return $this->doctor_Address_repository->updateOrCreate(
    //         ['user_id' => $data['user_id']],
    //         $payload
    //     );
    // }
}
