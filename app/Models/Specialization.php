<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsToMany(User::class,'doctor_specialities','speciality_id','user_id');
    }
    
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url("storage/" .  $value)
        );
    }

}
