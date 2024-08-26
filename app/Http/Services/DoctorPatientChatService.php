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


    public function getDoctorsChatList($doctorId, $searchPatient=null)
    {
       
        $chatUsers = User::with(['sentChatDetails','receivedChatDetails'])
                    ->whereIn('role',2);
                    // ->orderBy(DoctorPatientChat::select('last_time_message')->whereColumn('users.id','doctor_patient_chats.sender_id')->first(),'desc')
                    // ->orderBy(DoctorPatientChat::select('last_time_message')->whereColumn('users.id','doctor_patient_chats.receiver_id'),'desc')
        if($searchPatient != null)
        {
            if(count($searchKeys) > 1)
            {
                $query->where('first_name','like',"%$searchKeys[0]%")
                    ->where('last_name','like',"%$searchKeys[1]%");
            }
            else
            {
                $query->orWhere('first_name','like',"%$searchDoctor%")
                ->orWhere('last_name','like',"%$searchDoctor%");
            }
            $chatUsers->
        }
        {
            $chatUsers 
        }
        
        return [
            'chatUsers'   =>  $chatUsers,
        ];
    }

    public function getPatientsChatList($patientId, $searchDoctor=null)
    {
        if($searchDoctor !=  null && !empty($searchDoctor))
        {
            $patientLinkedDoctors = $this->bookingSlots->select('doctor_id')->distinct()
            ->where('patient_id',$patientId)
            ->whereHas('doctor', function($query) use($searchDoctor){
                $searchKeys = explode(' ',$searchDoctor);
                if(count($searchKeys) > 1)
                {
                    $query->where('first_name','like',"%$searchKeys[0]%")
                        ->where('last_name','like',"%$searchKeys[1]%");
                }
                else
                {
                    $query->orWhere('first_name','like',"%$searchDoctor%")
                    ->orWhere('last_name','like',"%$searchDoctor%");
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
