<?php

namespace App\Http\Services;

use App\Http\Repositories\DoctorPatientChatRepository;
use App\Http\Repositories\DoctorPatientChatHistoryRepository;
use App\Http\Repositories\UserRepository;

class DoctorPatientChatHistoryService
{
    private $doctorPatientChatHistoryRepository;
    private $doctorPatientChatRepository;
    private $userRepository;

    public function __construct(DoctorPatientChatHistoryRepository $doctorPatientChatHistoryRepository, DoctorPatientChatRepository $doctorPatientChatRepository,UserRepository $userRepository)
    {
        $this->doctorPatientChatHistoryRepository = $doctorPatientChatHistoryRepository;
        $this->doctorPatientChatRepository = $doctorPatientChatRepository;
        $this->userRepository = $userRepository;
    }


    public function getSelectedChatHistory($senderId, $receiverId, $chatId=null)
    {
        $chatHistory = [];

        if($chatId != null)
        {
            $chatHistory = $this->doctorPatientChatHistoryRepository->where('doctor_patient_chats_id',$chatId)->orderBy('message_sent_date','asc')->get()->groupBy('message_sent_date');
        }
        // dd($chatHistory);    
        $senderDetails = $this->userRepository->findOrFail($senderId);
        $receiverDetails = $this->userRepository->findOrFail($receiverId);

        return [
            'chatHistory'       =>  $chatHistory,
            'senderDetails'     =>  $senderDetails,
            'receiverDetails'   =>  $receiverDetails
        ];
    }


    public function saveChatMessage($sendMessageDetails)
    {
        $senderId = $sendMessageDetails['sender_id'];
        $receiverId = $sendMessageDetails['receiver_id'];
        $message = $sendMessageDetails['message'];
        $chatId = '';

        // If chat exists get the chat id to save message
        if(array_key_exists('chat_id',$sendMessageDetails) && !empty($sendMessageDetails['chat_id']))
        {
            $chatId = $sendMessageDetails['chat_id'];
        }
        
        // If chat id does not exists first create the chat to get the chat id and then send message
        if($chatId == '')
        {
            // check if chat id exists
            $chatDetails = $this->doctorPatientChatRepository->getChatDetails($senderId,$receiverId);

            if(!$chatDetails)
            {
                $chatDetails = $this->doctorPatientChatRepository->create([
                    'sender_id'         =>  $senderId,
                    'receiver_id'       =>  $receiverId,
                    'last_time_message' =>  now(),
                ]);
            }
            
            $chatId = $chatDetails->id;
        }

        // At this point we have retrieved the chat id, now lets send the message
        $this->doctorPatientChatHistoryRepository->create([
            'doctor_patient_chats_id'   =>  $chatId,
            'sender_id'         =>  $senderId,
            'receiver_id'       =>  $receiverId,
            'body'              =>  $message,
            'message_sent_date' =>  date('Y-m-d')
        ]);

        // Update last time sent message in chat details
        $this->doctorPatientChatRepository->where('id', $chatId)->update([
            'last_time_message' =>  now()
        ]);

        return $this->getSelectedChatHistory($senderId, $receiverId, $chatId);
    }
}
