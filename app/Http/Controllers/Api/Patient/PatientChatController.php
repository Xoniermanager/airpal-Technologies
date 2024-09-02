<?php

namespace App\Http\Controllers\Api\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendMessageRequest;
use App\Http\Services\DoctorPatientChatService;
use App\Http\Requests\GetSelectedChatHistoryRequest;
use App\Http\Services\DoctorPatientChatHistoryService;

class PatientChatController extends Controller
{
    private $doctorPatientChatService;
    private $doctorPatientChatHistoryService;

    public function __construct(DoctorPatientChatService $doctorPatientChatService, DoctorPatientChatHistoryService $doctorPatientChatHistoryService)
    {
        $this->doctorPatientChatService = $doctorPatientChatService;
        $this->doctorPatientChatHistoryService = $doctorPatientChatHistoryService;
    }

    public function getChatList(Request $request)
    {

        $patientId = Auth()->Guard('api')->user()->id;
        $searchKey = (array_key_exists('search', $request->all())) ? $request->search : '';

        $doctorPatientChatLists = $this->doctorPatientChatService->getPatientsChatList($patientId, $searchKey);
        
        $updatedChatUsersList = view('common_chat.user-chat-list')
            ->with('chatUsers', $doctorPatientChatLists['chatUsers'])->render();

        return [
            'status'    =>  true,
            'message'   =>  'Filtered patient chat list returned successfully!',
            'data'      =>  $updatedChatUsersList
        ];
    }


    /**
     * Get chat history for selected receiver id and currently logged in user id
     */
    public function getChatHistory(GetSelectedChatHistoryRequest $request)
    {
        $senderId = Auth()->Guard('api')->user()->id;
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

    /**
     * Send message to receiver
     */
    public function sendMessage(SendMessageRequest $sendMessageRequest)
    {
        $data = $sendMessageRequest->validated();
        $data['sender_id'] = Auth()->guard('api')->user()->id;
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
