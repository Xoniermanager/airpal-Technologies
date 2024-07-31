<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorQuestionOptions extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['question_id','options','status'];
    protected $table = 'question_options';

    public function questions()
    {
        return $this->belongsTo(DoctorQuestions::class);
    }
}
