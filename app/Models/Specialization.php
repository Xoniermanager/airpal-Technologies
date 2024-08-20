<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Specialization extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','description','status','image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function doctor()
    {
        return $this->hasOne(DoctorSpeciality::class);
    }
    

}
