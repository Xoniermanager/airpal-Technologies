<?php

namespace App\Http\Services;

use Illuminate\Support\Arr;
use App\Http\Repositories\DoctorPaypalConfigRepository;

class DoctorPaypalConfigService
{

    private $doctorPaypalConfigRepository;
    public function __construct(DoctorPaypalConfigRepository $doctorPaypalConfigRepository)
    {
        $this->doctorPaypalConfigRepository = $doctorPaypalConfigRepository;
    }
    public function storeDoctorPaypalConfigDetail($doctorId, $payload)
    {
        return $this->doctorPaypalConfigRepository->updateOrCreate(
            ['doctor_id' => $doctorId],
            $payload
        );
    }


    /**
     * Retrieve the paypal config details for doctor
     * @param $doctorId
     */
    public function getPaypalConfigByDoctor($doctorId)
    {
        return $this->doctorPaypalConfigRepository->where('doctor_id',$doctorId)->first();
    }
}
