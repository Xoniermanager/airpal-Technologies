<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DayOfWeek;
class DoctorWorkingHours extends Model
{
    use HasFactory;
    protected $fillable = ['day_id','user_id','available','start_time','end_time'];

    public function users()
    {
        return $this->belongsToMany(User::class,'doctor_working_hours');
    }

    public function daysOfWeek()
    {
        return $this->belongsTo(DayOfWeek::class,'day_id','id');
    }

}
