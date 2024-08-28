<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDiary extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'note', 'morning_breakfast', 'afternoon_lunch', 'night_dinner', 'morning_medicine', 'afternoon_medicine', 'night_medicine', 'pulse_rate', 'bp', 'avg_body_temp', 'avg_heart_beat', 'glucose', 'total_sleep_hr','pulse_rate','oxygen_level','weight'];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function patientAdditionalInfo()
    {
        return $this->hasMany(PatientDiaryAdditionalInfo::class, 'patient_diary_id', 'id');
    }
    public function medicationHealthProgress()
    {
        return $this->hasOne(MedicationHealthProgress::class, 'patient_diary_id', 'id');
    }
}
