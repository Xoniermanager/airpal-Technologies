<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DoctorQuestions extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id','specialty_id','question','answer_type','status'];
    protected $table = "doctor_questions";

    public function user()
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function specialty()
    {
        return $this->belongsTo(Specialization::class,'specialty_id');
    }

    public function options()
    {
        return $this->hasMany(DoctorQuestionOptions::class,'question_id','id');
    }

}
