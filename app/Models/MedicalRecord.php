<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'name', 'date', 'description', 'file', 'booking_slot_id'];

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url("storage/" .  $value)
        );
    }
}
