<?php

namespace App\Http\Controllers;

use App\Http\Services\DoctorPatientChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorPatientChatController extends Controller
{
    private $doctorPatientChatService;

    public function __construct(DoctorPatientChatService $doctorPatientChatService)
    {
        $this->doctorPatientChatService = $doctorPatientChatService;
    }

    public function getDoctorAllChats()
    {
        $doctorId = Auth::id();
        $doctorChats = $this->doctorPatientChatService->getDoctorAllChats($doctorId);
        return view('doctor.chats.all-chats');
    }
}
