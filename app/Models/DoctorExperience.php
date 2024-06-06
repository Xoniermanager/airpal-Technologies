<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DoctorExperience extends Model
{
    use HasFactory;
    protected $fillable = ['job_title','hospital_id','user_id','location','start_date','end_date','job_desription','currently_working'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
