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
         try {

          $bookingDetail =  $this->bookingDetail;
          $doctorId = $this->bookingDetail->doctor_id;
          
          $pdf = Pdf::loadView('invoice.invoice-template', ['bookingDetail' => $this->bookingDetail]);
          $fileName = 'invoice-pdf-' . $bookingDetail->id . '.pdf';
          $invoicePath = 'public/' . $doctorId . '/invoices/' . $fileName;
      
          // Ensure the directory exists
          $directory = 'public/' . $doctorId . '/invoices/';
          if (!Storage::exists($directory)) {
              Storage::makeDirectory($directory);
          }
      
          // Save the PDF
          Storage::put($invoicePath, $pdf->output(), 'public');
      
          // Update the invoice path in the database
          $bookingDetail->invoice_url = $invoicePath;
          $bookingDetail->save();
      } catch (\Exception $e) {
          // Handle the exception, log it or notify the user
          \Log::error('Failed to generate or save invoice: ' . $e->getMessage());
      }
      
    }
}
