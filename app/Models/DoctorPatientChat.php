<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPatientChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'last_time_id',
        'chat_status'
    ];

    public function senderDetails()
    {
        return $this->belongsTo(User::class,'sender_id','id');
    }

    public function receiverDetails()
    {
        return $this->belongsTo(User::class,'receiver_id','id');
    }

    public function messages()
    {
        return $this->hasMany(DoctorPatientChatHistory::class,'doctor_patient_chats_id','id');
    }

    public function getLatestChatDetails()
    {
        return $this->hasOne(DoctorPatientChatHistory::class,'doctor_patient_chats_id','id')->latest();
    }
}
