<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendMailForAppointmentDoctorQuery;

class DoctorAppointmentQueryMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $mailDataAndLink;
    public function __construct($mailDataAndLink) {
        $this->mailDataAndLink   = $mailDataAndLink;

    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to("xonier.puneet@gmail.com")->send(new SendMailForAppointmentDoctorQuery($this->mailDataAndLink));
    }
}
