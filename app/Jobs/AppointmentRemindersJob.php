<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentRemindersMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AppointmentRemindersJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $patientEmail  =  $this->appointment->patient->email;
        Mail::to($patientEmail)->send( mailable: new AppointmentRemindersMail($this->appointment));
    }
}
