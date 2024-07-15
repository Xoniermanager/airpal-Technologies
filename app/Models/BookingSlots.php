<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSlots extends Model
{
    
    use HasFactory;
    protected $fillable = ['doctor_id','patient_id','booking_date','slot_start_time','slot_end_time','attachment','insurance','note'];
}
