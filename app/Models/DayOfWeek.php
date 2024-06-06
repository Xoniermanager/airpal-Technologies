<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayOfWeek extends Model
{
    use HasFactory;

    public function doctorWorkingHour()
    {
        return $this->belongsTo(DoctorWorkingHours::class,'day_id','id');
    }
}
