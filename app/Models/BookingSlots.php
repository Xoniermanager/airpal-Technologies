<?php

namespace App\Models;


use App\Models\Payments;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingSlots extends Model
{

    use HasFactory;
    protected $table = 'booking_slots';
    protected $fillable = ['doctor_id', 'patient_id', 'booking_date', 'slot_start_time', 'slot_end_time', 'attachment', 'insurance', 'note', 'status', 'image', 'symptoms', 'meeting_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) =>  $value ? asset('appointment_booking/' .  $value) : ''
        );
    }
    public function payments()
    {
        return $this->hasOne(Payments::class, 'booking_id');
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class, 'booking_slot_id');
    }

    public function getPrescriptionButton()
    {
        $prescriptionButton = '';
        if ($this->status == 'completed') {
            if (isset($this->prescription)) {
                $prescriptionButton .= '<div class="appointment-start">';
                $prescriptionButton .= '<a class="btn btn-primary text-white" href=" ' . route('prescription.edit', Crypt::encrypt($this->prescription->id)) . '">Prescription</a>';
                $prescriptionButton .= '</div>';
            } else {
                $prescriptionButton .= '<div class="appointment-start">';
                $prescriptionButton .= '<a class="btn btn-light"
                        href="' . route('prescription.add', ['bookingId' => Crypt::encrypt($this->id)]) . '">Prescription</a>';
                $prescriptionButton .= '</div>';
            }
        }

        return $prescriptionButton;
    }


    public function doctorProfileUrl()
    {
        return  route('frontend.doctor.profile', ['user' => Crypt::encrypt($this->user->id)]);
    }
    public function patientProfileUrl()
    {
        return  route('doctor-patient-profile', ['id' => Crypt::encrypt($this->patient->id)]);
    }

    protected function meetingId(): Attribute
    {
        return Attribute::make(
            get: fn($value) =>  $value ? (env('MEETING_LINK', '') . '/' . $value) : ''
        );
    }

    public function getMeetingButton()
    {
        $buttonHtml = '';
        if ($this->status = 'confirmed') {
            if ($this->booking_date == date('Y-m-d')) {
                if (strtotime($this->slot_start_time) - 900 <= time() && strtotime($this->slot_end_time) >= time()) {
                    $buttonHtml .= '<div class="appointment-detail-btn">
                    <a href="' . $this->meeting_id . '" class="start-link"><i
                            class="fa-solid fa-calendar-check me-1"></i>Attend</a></div>';
                }
            }
        }
        return $buttonHtml;
    }
}
