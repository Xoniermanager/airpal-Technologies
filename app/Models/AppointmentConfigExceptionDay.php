<?php

namespace App\Models;

use App\Models\DayOfWeek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentConfigExceptionDay extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_appointment_config_id','exception_days_id'];
    
    public function exceptionDay()
    {
        return $this->belongsTo(DayOfWeek::class,'exception_days_id');
   
    }


}

