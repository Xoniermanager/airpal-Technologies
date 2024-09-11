<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\ChatService;

class DoctorPatientChatController extends Controller
{
    private $chatService;

    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }

    /**
     * Start : Endpoints for Doctor Panel
     */
    public function getDoctorAllChats()
    {
        $doctorId = Auth::id();
        $doctorPatientChatLists = $this->chatService->getDoctorsChatList($doctorId);

        return view('doctor.chats.all-chats')
            ->with('chatUsers', $doctorPatientChatLists['chatUsers']);
    }

    public function searchPatientListInChat(Request $request)
    {

        $doctorId = Auth::id();
        $searchKey = (array_key_exists('search', $request->all())) ? $request->search : '';

        $doctorPatientChatLists = $this->chatService->getDoctorsChatList($doctorId, $searchKey);

        $updatedChatUsersList = view('common_chat.user-chat-list')
            ->with('chatUsers', $doctorPatientChatLists['chatUsers'])->render();

        return [
            'status'    =>  true,
            'message'   =>  'Filtered patient chat list returned successfully!',
            'data'      =>  $updatedChatUsersList
        ];
    }
    /**
     * End : Endpoints for Doctor Panel
     */


    /**
     * Start : Endpoints for patient Panel
     */
    public function getPatientsChatList()
    {
        $patientId = Auth::id();
        $doctorPatientChatLists = $this->chatService->getPatientsChatList($patientId);

        return view('patients.chats.all-chats')
            ->with('chatUsers', $doctorPatientChatLists['chatUsers']);
    }

    public function searchDoctorListInChat(Request $request)
    {

        $patientId = Auth::id();
        $searchKey = (array_key_exists('search', $request->all())) ? $request->search : '';

        $doctorPatientChatLists = $this->chatService->getPatientsChatList($patientId, $searchKey);
        
        $updatedChatUsersList = view('common_chat.user-chat-list')
            ->with('chatUsers', $doctorPatientChatLists['chatUsers'])->render();

        return [
            'status'    =>  true,
            'message'   =>  'Filtered patient chat list returned successfully!',
            'data'      =>  $updatedChatUsersList
        ];
    }
    /**
     * End : Endpoints for Patient Panel
     */
}
