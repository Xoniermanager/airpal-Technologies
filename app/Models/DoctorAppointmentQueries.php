<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAppointmentQueries extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id','question_and_answer'];
}
