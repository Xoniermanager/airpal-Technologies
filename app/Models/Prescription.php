<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = ['booking_slot_id', 'description', 'start_date', 'end_date', 'diagnosis', 'advice', 'follow_up'];

    public function prescriptionMedicineDetail()
    {
        return $this->hasMany(PrescriptionMedicineDetail::class);
    }
    public function prescriptionTest()
    {
        return $this->hasMany(PrescriptionTest::class);
    }
    public function bookingSlot()
    {
        return $this->belongsTo(BookingSlots::class, 'booking_slot_id');
    }
    public function appointment()
    {
        return $this->belongsTo(BookingSlots::class);
    }
}
