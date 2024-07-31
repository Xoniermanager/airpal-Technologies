<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorQuestions extends Model
{
    use HasFactory ,SoftDeletes;

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
