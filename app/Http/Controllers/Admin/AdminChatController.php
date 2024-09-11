<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\ChatService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GetSelectedChatHistoryRequest;
use App\Http\Services\DoctorPatientChatHistoryService;

class AdminChatController extends Controller
{
    private $chatService;
    private $doctorPatientChatHistoryService;

    public function __construct(ChatService $chatService, DoctorPatientChatHistoryService $doctorPatientChatHistoryService)
    {
        $this->chatService = $chatService;
        $this->doctorPatientChatHistoryService = $doctorPatientChatHistoryService;
    }

    /**
     * Get all users including doctor and patient to chat with admin
     */
    public function getChatList()
    {
        $adminId = Auth::id();

        $chatUsers = $this->chatService->getAdminChatUsers($adminId);
        // dd($chatUsers);
        return view('admin.chat.all-chats')->with('chatUsers',$chatUsers['chatUsers']);

    }

    
    /**
     * Search all chat user by name
     */
    public function searchChatUser(Request $request)
    {
        $doctorId = Auth::id();
        $searchKey = (array_key_exists('search', $request->all())) ? $request->search : '';

        $doctorPatientChatLists = $this->chatService->getAdminChatUsers($doctorId, $searchKey);

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
            'data'          =>  [
                'receiverDetails'       =>  $updatedChatHistory['receiverDetails'],
                'senderDetails'         =>  $updatedChatHistory['senderDetails'],
                'chatHistory'           =>  $updatedChatHistory['chatHistory'],
            ]
        ]);
    }
}
