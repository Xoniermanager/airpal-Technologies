<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorAddressRequest;
use App\Http\Services\DoctorAddressServices;

class DoctorAddressController extends Controller
{
    private $doctor_address_services;
    public function __construct(DoctorAddressServices $doctor_address_services)
    {
        $this->doctor_address_services  = $doctor_address_services;
    }
    public function addAddress(StoreDoctorAddressRequest $request)
    {
        $addedDoctorAddress = $this->doctor_address_services->createOrUpdateAddress($request->all());
              if ($addedDoctorAddress)
               {
                 return response()->json([
                       "status"   => "success",
                       "message" => "Doctor address details saved!"
                  ]);
               } else 
               {
                 return response()->json([
                  "status"=> "error",
                  "message"=> "Failed to insert doctor address"
                 ]);
               }
    }
}
