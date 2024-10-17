<?php
namespace App\Http\Services;
use App\Models\User;
use App\Models\Country;
use App\Http\Repositories\DoctorServiceRepository;

class DoctorServiceAddServices {
    private  $doctor_service_repository;
    public function __construct(DoctorServiceRepository $doctor_service_repository)
    {
        $this->doctor_service_repository = $doctor_service_repository;
    }
     
//     public function addDoctorServices($userId, $services)
//     {

//       foreach ($services as  $serviceId) {
//          $servicesData = [
//              'user_id' => $userId,
//              'service_id' => $serviceId,
//          ];
//         return $this->doctor_service_repository->create($servicesData);
//     }
//    }
public function addOrUpdateDoctorServices($userId, $services) {


    $userDetails = User::find($userId);
    $userDetails->services()->sync($services);
    return true;
}


}




