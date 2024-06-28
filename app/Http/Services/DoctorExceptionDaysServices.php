<?php

namespace App\Http\Services;

use App\Http\Repositories\DoctorSlotRepository;

class DoctorExceptionDaysServices
{
    private  $doctorSlotRepository;
    private $doctorExceptionDaysServices;

    public function __construct(DoctorSlotRepository $doctorSlotRepository,DoctorExceptionDaysServices $doctorExceptionDaysServices)
    {
        $this->doctorSlotRepository = $doctorSlotRepository;
        $this->doctorExceptionDaysServices = $doctorExceptionDaysServices;
    }

    public function create($data)
    {
        $payload = [
            "doctor_id" =>$data['doctor_id'],
            "exception_days_id" =>$data['exception_days_id'],
        ];
        $this->doctorSlotRepository->create($payload);

        foreach($data['exception_day_id'] as $exception_day_id)
        {
        $this->doctorExceptionDaysServices->create(
            [
                "user_id" =>$data['doctor_id'],
                "exception_days_id" => $exception_day_id,
            ]
        );
    }
        

    }


}
