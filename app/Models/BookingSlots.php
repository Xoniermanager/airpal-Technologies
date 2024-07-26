<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingSlots extends Model
{

    use HasFactory;
    protected $table = 'booking_slots';
    protected $fillable = ['doctor_id', 'patient_id', 'booking_date', 'slot_start_time', 'slot_end_time', 'attachment', 'insurance', 'note', 'status', 'image', 'symptoms'];

    public function user()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  $value ? asset('appointment_booking/' .  $value) : ''
        );
    }
}
