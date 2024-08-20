<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteDoctor extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id','patient_id','status'];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
