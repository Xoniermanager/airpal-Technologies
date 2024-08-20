<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDiaryAdditionalInfo extends Model
{
    use HasFactory;

    protected $fillable   = ['patient_diary_id', 'type', 'additional_note'];
}
