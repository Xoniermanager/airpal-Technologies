<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\BookingSlots;
use App\Http\Services\BookingServices;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateMeetingIdJob implements ShouldQueue
{
    use Queueable;
    /**
     * Create a new job instance.
     */
    private $bookingId;
    public function __construct($bookingId = null)
    {
        $this->bookingId = $bookingId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (!$this->bookingId == null) {
            $id = $this->bookingId;
            $allBookingDetails = BookingSlots::where('id',$id)->whereDate('booking_date', Carbon::today())->whereNull('meeting_id')->get();
        } else {
            $allBookingDetails = BookingSlots::whereDate('booking_date', Carbon::today())->where('status', 'confirmed')->whereNull('meeting_id')->get();
        }
        foreach ($allBookingDetails as $bookingDetails) {
            $timestamp = now()->format('YmdHis');
            $meeetingId = $bookingDetails->doctor_id . $timestamp . $bookingDetails->patient_id;
            $bookingDetails->update(['meeting_id' => $meeetingId]);
        }
    }
}
