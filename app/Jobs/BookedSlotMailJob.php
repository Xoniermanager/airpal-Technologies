<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SendMailBookedSlots;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendMailForAppointmentDoctorQuery;

class BookedSlotMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    
     private $mailData;
     private $pdfPath;

     public function __construct($mailData,$pdfPath)
     {
         $this->mailData = $mailData;
         $this->pdfPath  = $pdfPath;
     }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to("xonier.puneet@gmail.com")->send(new SendMailBookedSlots($this->mailData,$this->pdfPath));
    }
}
