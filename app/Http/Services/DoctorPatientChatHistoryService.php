<?php

namespace App\Http\Services;

use App\Events\MessageSent;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\DoctorPatientChatRepository;
use App\Http\Repositories\DoctorPatientChatHistoryRepository;

class DoctorPatientChatHistoryService
{
    private $doctorPatientChatHistoryRepository;
    private $doctorPatientChatRepository;
    private $chatService;
    private $userRepository;

    public function __construct(DoctorPatientChatHistoryRepository $doctorPatientChatHistoryRepository, 
    DoctorPatientChatRepository $doctorPatientChatRepository,
    UserRepository $userRepository,
    ChatService $chatService)
    {
        $this->doctorPatientChatHistoryRepository = $doctorPatientChatHistoryRepository;
        $this->doctorPatientChatRepository = $doctorPatientChatRepository;
        $this->userRepository = $userRepository;
        $this->chatService = $chatService;
    }


    public function getSelectedChatHistory($senderId, $receiverId, $readStatus=0)
    {
        $chatHistory = $this->doctorPatientChatHistoryRepository
        ->where(['sender_id'    =>  $senderId, 'receiver_id'    =>  $receiverId])
        ->orWhere('receiver_id','=',$senderId)
        ->where('sender_id','=',$receiverId);

        if($readStatus)
        {
            $chatHistory->update(['read' =>  1]);
        }

        $chatHistory =  $chatHistory->orderBy('message_sent_date','asc')->take(60)->get()->groupBy('message_sent_date');

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
            $chatDetails = $this->chatService->getChatDetails($senderId,$receiverId);

            if(!$chatDetails)
            {
                $chatDetails = $this->doctorPatientChatRepository->create([
                    'sender_id'         =>  $senderId,
                    'receiver_id'       =>  $receiverId
                ]);
            }
            
            $chatId = $chatDetails->id;
        }

        // At this point we have retrieved the chat id, now lets send the message
        $sentMessageDetails = $this->doctorPatientChatHistoryRepository->create([
            'doctor_patient_chats_id'   =>  $chatId,
            'sender_id'         =>  $senderId,
            'receiver_id'       =>  $receiverId,
            'body'              =>  $message,
            'read'              =>  0,
            'message_sent_date' =>  date('Y-m-d')
        ]);

        // Update last time sent message in chat details
        $this->doctorPatientChatRepository->where('id', $chatId)->update([
            'last_message_id' =>  $sentMessageDetails->id
        ]);

        broadcast(new MessageSent($sentMessageDetails));
        return $this->getSelectedChatHistory($senderId, $receiverId,0);
    }
}
