<?php

namespace App\Jobs;

use App\Mail\SendMailToUser;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendOtpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $mailData;
    public function __construct($mailData) {
        $this->mailData   = $mailData;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to("xonier.puneet@gmail.com")->send(new SendMailToUser($this->mailData));
    }
}
