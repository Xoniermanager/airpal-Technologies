<?php

namespace App\Http\Services;

use App\Http\Repositories\DoctorPatientChatHistoryRepository;
use App\Models\User;
use App\Models\BookingSlots;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\DoctorPatientChatRepository;

class DoctorPatientChatService
{
    private  $doctorPatientChatRepository;
    private $doctorPatientChatHistoryRepository;

    public function __construct(DoctorPatientChatRepository $doctorPatientChatRepository, DoctorPatientChatHistoryRepository $doctorPatientChatHistoryRepository)
    {
        $this->doctorPatientChatRepository = $doctorPatientChatRepository;
        $this->doctorPatientChatHistoryRepository = $doctorPatientChatHistoryRepository;
    }


    public function getDoctorsChatList($doctorId, $searchPatient=null)
    {
        // Get all patients list to allow chat between doctor and patients
        $chatList = User::select(['users.id',
        'users.first_name', 'users.last_name', 'users.gender', 'users.image_url',
        'doctor_patient_chat_histories.body as last_message',
        'doctor_patient_chats.id as chat_id',
        'doctor_patient_chat_histories.created_at as last_message_date'])
        ->where('users.id','!=',$doctorId)
        ->where('users.role','=',3)
        ->when(!empty($searchPatient), function ($query) use($searchPatient){
           return $query->where('users.first_name','like','%'. $searchPatient .'%')
           ->orWhere('users.last_name','like','%'. $searchPatient .'%')
           ->orWhere(DB::raw("CONCAT(`users`.`first_name`, ' ', `users`.`last_name`)"),'like','%'. $searchPatient .'%');
        })
           ->leftJoin('doctor_patient_chats', function($join) use ($doctorId){
            $join->on('doctor_patient_chats.sender_id','=','users.id')
                ->where('doctor_patient_chats.receiver_id','=',$doctorId)
            ->orWhere(function($query) use ($doctorId){
                $query->on('doctor_patient_chats.receiver_id','=','users.id')
                ->where('doctor_patient_chats.sender_id','=',$doctorId);
            });
        })
        ->leftJoin('doctor_patient_chat_histories','doctor_patient_chat_histories.id','=','doctor_patient_chats.last_message_id')
        ->orderBy('doctor_patient_chat_histories.created_at','desc')
        ->orderBy('doctor_patient_chats.chat_status','asc')
        ->orderBy('users.first_name','asc')
        ->get();

        $chatListWithMessageCounter = $this->addUnreadMessageCounter($chatList, $doctorId);

        return [
            'chatUsers'   =>  $chatListWithMessageCounter,
        ];
    }

    public function getPatientsChatList($patientId, $searchDoctor='')
    {
        // Get all doctors list to allow chat between patient and doctors
        $chatList = User::select(['users.id',
        'users.first_name', 'users.last_name', 'users.gender', 'users.image_url',
        'doctor_patient_chat_histories.body as last_message',
        'doctor_patient_chats.id as chat_id',
        'doctor_patient_chat_histories.created_at as last_message_date'])
        ->where('users.id','!=',$patientId)
        ->where('users.role','=',2)
        ->when(!empty($searchDoctor), function ($query) use($searchDoctor){
           return $query->where('users.first_name','like','%'. $searchDoctor .'%')
           ->orWhere('users.last_name','like','%'. $searchDoctor .'%')
           ->orWhere(DB::raw("CONCAT(`users`.`first_name`, ' ', `users`.`last_name`)"),'like','%'. $searchDoctor .'%');
        })
           ->leftJoin('doctor_patient_chats', function($join) use ($patientId){
            $join->on('doctor_patient_chats.sender_id','=','users.id')
            ->where('doctor_patient_chats.receiver_id','=',$patientId)
            ->orWhere(function($query) use ($patientId){
                $query->on('doctor_patient_chats.receiver_id','=','users.id')
                ->where('doctor_patient_chats.sender_id','=',$patientId);
            });
        })
        ->leftJoin('doctor_patient_chat_histories','doctor_patient_chat_histories.id','doctor_patient_chats.last_message_id')
        ->orderBy('doctor_patient_chat_histories.created_at','desc')
        ->orderBy('doctor_patient_chats.chat_status','asc')
        ->orderBy('users.first_name','asc')
        ->get();

        $chatListWithMessageCounter = $this->addUnreadMessageCounter($chatList, $patientId);

        return [
            'chatUsers'   =>  $chatListWithMessageCounter,
        ];
    }


    public function addUnreadMessageCounter($chatList, $currentUser)
    {
        foreach($chatList as $chat)
        {
            $unreadCounter = 0;

            if($chat->chat_id)
            {
                $unreadCounter = $this->doctorPatientChatHistoryRepository
                ->where('doctor_patient_chats_id','=',$chat->chat_id)
                ->where('sender_id','!=',$currentUser)
                ->where('read','=',0)
                ->count();
            }
            $chat->unreadCounter = $unreadCounter;
        }

        return $chatList;
    }

    // Get Chat Details
    public function getChatDetails($senderId,$receiverId)
    {
        return $this->doctorPatientChatRepository->where(['sender_id'    =>  $senderId, 'receiver_id'    =>  $receiverId])
        ->orWhere('receiver_id','=',$senderId)
        ->where('sender_id','=',$receiverId)->first();
    }

    /*
    Old code to show users in chat based on bookings table
    */
        // if($searchDoctor !=  null && !empty($searchDoctor))
        // {
        //     $patientLinkedDoctors = $this->bookingSlots->select('doctor_id')->distinct()
        //     ->where('patient_id',$patientId)
        //     ->whereHas('doctor', function($query) use($searchDoctor){
        //         $searchKeys = explode(' ',$searchDoctor);
        //         if(count($searchKeys) > 1)
        //         {
        //             $query->where('first_name','like',"%$searchKeys[0]%")
        //                 ->where('last_name','like',"%$searchKeys[1]%");
        //         }
        //         else
        //         {
        //             $query->orWhere('first_name','like',"%$searchDoctor%")
        //             ->orWhere('last_name','like',"%$searchDoctor%");
        //         }
        //         return $query;  
        //     })->get()->pluck('doctor_id')->toArray();
        // }
        // else
        // {
        //     $patientLinkedDoctors = $this->bookingSlots->select('doctor_id')->distinct()->where('patient_id',$patientId)->get()->pluck('doctor_id')->toArray();
        // }
}
