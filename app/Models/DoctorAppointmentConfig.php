<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAppointmentConfig extends Model
{
    use HasFactory;

    protected $table = 'doctor_appointment_configs';
    protected $fillable = ['user_id', 'slot_duration', 'cleanup_interval', 'start_month', 'end_month', 'exception_day_id', 'slots_in_advance', 'start_slots_from_date', 'stop_slots_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctorExceptionDays()
    {
        return $this->hasMany(AppointmentConfigExceptionDay::class);
    }
}
