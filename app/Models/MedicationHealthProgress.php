<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationHealthProgress extends Model
{
    use HasFactory;
    protected $fillable = ['patient_diary_id', 'health_progress', 'side_effect', 'improvement'];
}
