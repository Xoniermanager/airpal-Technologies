<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetSelectedChatHistoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SendMessageRequest;
use App\Http\Services\DoctorPatientChatService;
use App\Http\Services\DoctorPatientChatHistoryService;

class DoctorPatientChatHistoryController extends Controller
{
    
    private $doctorPatientChatService;
    private $doctorPatientChatHistoryService;

    public function __construct(DoctorPatientChatService $doctorPatientChatService, DoctorPatientChatHistoryService $doctorPatientChatHistoryService)
    {
        $this->doctorPatientChatService = $doctorPatientChatService;
        $this->doctorPatientChatHistoryService = $doctorPatientChatHistoryService;
    }

    public function getSelectedChatHistory(GetSelectedChatHistoryRequest $request)
    {
        $senderId = Auth::user()->id;
        $receiverId = $request->receiver_user_id;

        $chatHistoryDetails = $this->doctorPatientChatHistoryService->getSelectedChatHistory($senderId, $receiverId);

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
