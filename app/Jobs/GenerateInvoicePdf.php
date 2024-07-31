<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateInvoicePdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $bookingDetail;
    public function __construct($bookingDetail)
    {
      $this->bookingDetail = $bookingDetail;   
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $bookingDetail =  $this->bookingDetail;
        $doctorId = $this->bookingDetail->doctor_id;
         // Generate the PDF using the facade
        $pdf = Pdf::loadView('invoice.invoice-template', ['bookingDetail'  =>  $this->bookingDetail]);

        // Creating the invoice name and path path to store
         $fileName = 'invoice-pdf-' . time() . '.pdf';
         $invoicePath = 'public/' . $doctorId . '//invoices/' . $fileName;

        Storage::put($invoicePath, $pdf->output());

        // Save the invoice path in database
         $bookingDetail->invoice_url = $invoicePath;
         $bookingDetail->save();
    }
}
