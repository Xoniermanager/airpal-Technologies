<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use App\Mail\ConfirmAppointmentByDoctor;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ConfirmAppointmentByDoctorJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $bookingDetails;

    public function __construct($bookingDetails)
    {
        $this->bookingDetails = $bookingDetails;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $patientEmail  =  $this->bookingDetails->patient->email;
        Mail::to($patientEmail)->send(mailable: new ConfirmAppointmentByDoctor($this->bookingDetails));
    }
}
