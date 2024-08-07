<?php

namespace App\Http\Services;

use App\Http\Repositories\DoctorPatientChatRepository;

class DoctorPatientChatService
{
    private  $doctorPatientChatRepository;

    public function __construct(DoctorPatientChatRepository $doctorPatientChatRepository)
    {
        $this->doctorPatientChatRepository = $doctorPatientChatRepository;
    }

    public function getDoctorAllChats($doctorId)
    {
        return $this->doctorPatientChatRepository->where('sender_id',$doctorId)->get();
    }
}
