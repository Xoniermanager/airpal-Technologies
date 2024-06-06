<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DoctorLanguage extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','language_id'];

    public function user()
    {
        return $this->belongsToMany(User::class,'doctor_languages');
    }

}
