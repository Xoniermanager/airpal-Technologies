<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    
    protected $fillable = ['booking_id','amount'];

    public function bookings()
    {
        return $this->belongsTo(BookingSlots::class, 'id');
    }
}
