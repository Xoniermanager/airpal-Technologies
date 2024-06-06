<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DoctorEducation;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function DoctorEducation()
    {
        return $this->belongsTo(DoctorEducation::class);
    }
}
