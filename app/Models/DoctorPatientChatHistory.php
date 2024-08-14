<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPatientChatHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_patient_chats_id',
        'sender_id',
        'receiver_id',
        'body',
        'read',
        'is_file',
        'message_sent_date'
    ];
}
