<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

class DoctorExperience extends Model
{
    use HasFactory;
    protected $fillable = ['job_title','hospital_id','user_id','location','start_date','end_date','job_description','currently_working','certificates'];

    protected function certificates(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url("storage/" .  $value)
        );
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hospital()
    {
        return $this->belongsTo(Hospital::class,"hospital_id",'id');
    }
    
    
}
