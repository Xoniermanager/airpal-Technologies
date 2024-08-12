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
        // // Getting active conversation details
        // $activeChats = $this->doctorPatientChatRepository->with(['senderDetails','receiverDetails'])->where('sender_id',$doctorId)->orWhere('receiver_id',$doctorId)->get();

        // $allSenderIds = $activeChats->pluck('sender_id')->toArray();
        // $allReceiverIds = $activeChats->pluck('receiver_id')->toArray() ;

        // // Now combine all sender and receiver ids and remove the duplicate values using array_unique
        // $allSenderAndReceiverIds = array_merge($allSenderIds,$allReceiverIds);
        // $uniqueSenderAndReceiverIds = array_unique($allSenderAndReceiverIds);

        // // Now remove the current logged in doctor id from the list
        // $uniqueSenderAndReceiverIdsExceptCurrentUser = array_diff($uniqueSenderAndReceiverIds,array($doctorId));

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
        // dd($chatUsers);
        return [
            'chatUsers'   =>  $chatUsers,
        ];
    }
}
