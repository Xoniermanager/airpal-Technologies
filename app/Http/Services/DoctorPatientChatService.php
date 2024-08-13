<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\BookingSlots;
use App\Models\DoctorPatientChat;
use App\Http\Repositories\DoctorPatientChatRepository;

class DoctorPatientChatService
{
    private  $doctorPatientChatRepository;
    private  $bookingSlots;

    public function __construct(DoctorPatientChatRepository $doctorPatientChatRepository, BookingSlots $bookingSlots)
    {
        $this->doctorPatientChatRepository = $doctorPatientChatRepository;
        $this->bookingSlots = $bookingSlots;
    }


    public function getDoctorAllChatList($doctorId, $searchPatient=null)
    {
        if($searchPatient !=  null && !empty($searchPatient))
        {
            $doctorLinkedPatients = $this->bookingSlots->select('patient_id')->distinct()
            ->where('doctor_id',$doctorId)
            ->whereHas('patient', function($query) use($searchPatient){
                $searchKeys = explode(' ',$searchPatient);
                $query->where('first_name','like',"%$searchKeys[0]%")
                ->orWhere('last_name','like',"%$searchKeys[0]%");

                if($searchKeys > 1)
                {
                    foreach($searchKeys as $searchKey)
                    {
                        $query->orWhere('first_name','like',"%$searchKey[0]%")
                        ->orWhere('last_name','like',"%$searchKey[0]%");
                    }
                }
                return $query;
            })->get()->pluck('patient_id')->toArray();
        }
        else
        {
            $doctorLinkedPatients = $this->bookingSlots->select('patient_id')->distinct()->where('doctor_id',$doctorId)->get()->pluck('patient_id')->toArray();
        }
       
        $chatUsers = User::with(['sentChatDetails','receivedChatDetails'])
                    ->whereIn('id',$doctorLinkedPatients)
                    ->orderBy(DoctorPatientChat::select('last_time_message')->whereColumn('users.id','doctor_patient_chats.sender_id'),'desc')
                    ->orderBy(DoctorPatientChat::select('last_time_message')->whereColumn('users.id','doctor_patient_chats.receiver_id'),'desc')
                    ->get();
        return [
            'chatUsers'   =>  $chatUsers,
        ];
    }

    public function getPatientAllChatList($patientId, $searchDoctor=null)
    {
        if($searchDoctor !=  null && !empty($searchDoctor))
        {
            $patientLinkedDoctors = $this->bookingSlots->select('doctor_id')->distinct()
            ->where('patient_id',$patientId)
            ->whereHas('doctor', function($query) use($searchDoctor){
                $searchKeys = explode(' ',$searchDoctor);
                $query->where('first_name','like',"%$searchKeys[0]%")
                ->orWhere('last_name','like',"%$searchKeys[0]%");

                if($searchKeys > 1)
                {
                    foreach($searchKeys as $searchKey)
                    {
                        $query->where('first_name','like',"%$searchKey[0]%")
                        ->orWhere('last_name','like',"%$searchKey[0]%");
                    }
                }
                return $query;  
            })->get()->pluck('doctor_id')->toArray();
        }
        else
        {
            $patientLinkedDoctors = $this->bookingSlots->select('doctor_id')->distinct()->where('patient_id',$patientId)->get()->pluck('doctor_id')->toArray();
        }

        $chatUsers = User::with(['sentChatDetails','receivedChatDetails'])
                    ->whereIn('id',$patientLinkedDoctors)
                    // ->orderBy(DoctorPatientChat::select('last_time_message')
                    //     ->whereColumn('users.id','doctor_patient_chats.sender_id')
                    //     ->whereColumn('users.id','doctor_patient_chats.receiver_id'),'desc')
                    // ->orderBy(DoctorPatientChat::select('last_time_message')
                    //     ->whereColumn('users.id','doctor_patient_chats.sender_id')
                    //     ->whereColumn('users.id','doctor_patient_chats.receiver_id'),'desc')
                    ->get();
        
        return [
            'chatUsers'   =>  $chatUsers,
        ];
    }
}
