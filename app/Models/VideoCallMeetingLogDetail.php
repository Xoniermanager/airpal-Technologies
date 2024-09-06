<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCallMeetingLogDetail extends Model
{
    use HasFactory;
    protected $fillable = ['meeting_id', 'person1_name', 'person1_join_time', 'person2_name', 'person2_join_time', 'call_end_time'];
}
