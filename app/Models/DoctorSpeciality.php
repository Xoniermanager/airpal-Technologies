<?php

namespace App\Models;

use App\Models\User;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorSpeciality extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','speciality_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsToMany(Course::class,'speciality_id');
    }

    public function specialty()
    {        
        return $this->belongsTo(Specialization::class, 'speciality_id');
    }
}
