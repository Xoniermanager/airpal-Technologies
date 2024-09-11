<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetSelectedChatHistoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SendMessageRequest;
use App\Http\Services\ChatService;
use App\Http\Services\DoctorPatientChatHistoryService;

class DoctorPatientChatHistoryController extends Controller
{
    
    private $chatService;
    private $doctorPatientChatHistoryService;

    public function __construct(ChatService $chatService, DoctorPatientChatHistoryService $doctorPatientChatHistoryService)
    {
        $this->chatService = $chatService;
        $this->doctorPatientChatHistoryService = $doctorPatientChatHistoryService;
    }

    public function getSelectedChatHistory(GetSelectedChatHistoryRequest $request)
    {
        $senderId = Auth::user()->id;
        $receiverId = $request->receiver_user_id;
        $readStatus = $request->read_status;

        $chatHistoryDetails = $this->doctorPatientChatHistoryService->getSelectedChatHistory($senderId, $receiverId,$readStatus);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Chat history loaded successfully.',
            'data'      =>  view('common_chat.chat-history-body',[
                'receiverDetails'       =>  $chatHistoryDetails['receiverDetails'],
                'senderDetails'         =>  $chatHistoryDetails['senderDetails'],
                'chatHistory'           =>  $chatHistoryDetails['chatHistory'],
            ])->render()
        ]);
    }

    public function saveChatMessage(SendMessageRequest $sendMessageRequest)
    {
        $data = $sendMessageRequest->validated();
        $data['sender_id'] = Auth::id();
        $updatedChatHistory = $this->doctorPatientChatHistoryService->saveChatMessage($data);

        return response()->json([
            'status'        =>  true,
            'message'       =>  'Message sent successfully!',
            'data'          =>  view('common_chat.chat-history-body',[
                'receiverDetails'       =>  $updatedChatHistory['receiverDetails'],
                'senderDetails'         =>  $updatedChatHistory['senderDetails'],
                'chatHistory'           =>  $updatedChatHistory['chatHistory'],
            ])->render()
        ]);
    }
}
