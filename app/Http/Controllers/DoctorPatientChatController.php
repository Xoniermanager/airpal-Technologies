<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\DoctorPatientChatService;

class DoctorPatientChatController extends Controller
{
    private $doctorPatientChatService;

    public function __construct(DoctorPatientChatService $doctorPatientChatService)
    {
        $this->doctorPatientChatService = $doctorPatientChatService;
    }

    /**
     * Start : Endpoints for Doctor Panel
     */
    public function getDoctorAllChats()
    {
        $doctorId = Auth::id();
        $doctorPatientChatLists = $this->doctorPatientChatService->getDoctorAllChatList($doctorId);

        return view('doctor.chats.all-chats')
        ->with('chatUsers',$doctorPatientChatLists['chatUsers']);
    }

    public function searchPatientListInChat(Request $request)
    {
        
        $doctorId = Auth::id();
        $searchKey = (array_key_exists('search',$request->all())) ? $request->search : '';

        $doctorPatientChatLists = $this->doctorPatientChatService->getDoctorAllChatList($doctorId,$searchKey);

        $updatedChatUsersList = view('doctor.chats.user-chat-list')
        ->with('chatUsers',$doctorPatientChatLists['chatUsers'])->render();

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
    public function getPatientAllChats()
    {
        $patientId = Auth::id();
        $doctorPatientChatLists = $this->doctorPatientChatService->getPatientAllChatList($patientId);

        return view('doctor.chats.all-chats')
        ->with('chatUsers',$doctorPatientChatLists['chatUsers']);
    }

    public function searchDoctorListInChat(Request $request)
    {
        
        $patientId = Auth::id();
        $searchKey = (array_key_exists('search',$request->all())) ? $request->search : '';

        $doctorPatientChatLists = $this->doctorPatientChatService->getPatientAllChatList($patientId,$searchKey);
        $updatedChatUsersList = view('doctor.chats.user-chat-list')
        ->with('chatUsers',$doctorPatientChatLists['chatUsers'])->render();

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
