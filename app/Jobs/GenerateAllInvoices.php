<?php

namespace App\Jobs;

use App\Models\BookingSlots;
use Illuminate\Bus\Queueable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateAllInvoices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Fetch all confirmed appointments
            $appointments = BookingSlots::where('status', 'confirmed')->get();

            foreach ($appointments as $appointment) {
                $doctorId = $appointment->doctor_id;
                $pdf = Pdf::loadView('invoice.invoice-template', ['bookingDetail' => $appointment]);
                $fileName = 'invoice-pdf-' . time() . '-' . $appointment->id . '.pdf';
                $invoicePath = 'public/' . $doctorId . '/invoices/' . $fileName;

                // Ensure the directory exists
                $directory = 'public/' . $doctorId . '/invoices/';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }

                // Save the PDF
                Storage::put($invoicePath, $pdf->output(), 'public');

                // Update the invoice path in the database
                $appointment->invoice_url = $invoicePath;
                $appointment->save();
            }
        } catch (\Exception $e) {
            // Handle the exception, log it or notify the user
            \Log::error('Failed to generate or save invoice: ' . $e->getMessage());
        }
    }
}
