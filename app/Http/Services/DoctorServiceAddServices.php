<?php
namespace App\Http\Services;
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

    
    $currentServices = $this->doctor_service_repository->where('user_id', $userId)->pluck('service_id')->toArray();
    $servicesToAddOrUpdate  = array_diff($services, $currentServices);
    $servicesToRemove   = array_diff($currentServices, $services);
    if (!empty($servicesToRemove)) {
        $this->doctor_service_repository->where('user_id', $userId)
            ->whereIn('service_id', $servicesToRemove)
            ->delete();
    }

    foreach ($servicesToAddOrUpdate as $service) {
        $this->doctor_service_repository->updateOrCreate(
            ['user_id' => $userId, 'service_id' => $service],
            ['user_id' => $userId, 'service_id' => $service]
        );
    }
    return true;
}

}




