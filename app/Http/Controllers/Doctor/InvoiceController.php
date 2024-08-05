<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{

    private $userServices;
    private $bookingServices;
    public function __construct(UserServices $userServices, BookingServices $bookingServices)
    {
        $this->userServices = $userServices;
        $this->bookingServices = $bookingServices;
    }
    public function doctorInvoices()
    {
        $doctorDetails = $this->userServices->getDoctorDataById(auth::id());

        $invoiceDetails = $this->bookingServices->doctorBookings(auth::id())->paginate(10);
        return view('doctor.invoices.doctor-invoices', ['doctorDetails' => $doctorDetails ,'invoiceDetails' => $invoiceDetails]);
    }
    public function previewInvoice(Request $request)
    {
        $bookingId = $request->appointment_id;
        $invoiceDetails = $this->bookingServices->appointmentsById($bookingId)->first();
        
        return response()->json([
            'message'  => 'retrieved!',
            'data'     =>  view('invoice.invoice-template', [
              'bookingDetail' => $invoiceDetails
            ])->render()
          ]);
    }
    public function downloadInvoice(Request $request)
    {
        try {

            $bookingId = $request->appointment_id;
            $bookingDetail = $this->bookingServices->appointmentsById($bookingId)->first();
            $doctorId = $bookingDetail->doctor_id;
            
            $pdf = Pdf::loadView('invoice.invoice-template', ['bookingDetail' => $bookingDetail]);
            $fileName = 'invoice-pdf-' . time() . '.pdf';
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

            $invoicePdfUrl = Storage::url($bookingDetail->invoice_url);

            $bookingDetail->save();
            return response()->json([
            'status' => true,
            'message'  => 'retrieved!',
            'invoice_pdf_url' => $invoicePdfUrl
            ]);

        } catch (\Exception $e) {
            // Handle the exception, log it or notify the user
            \Log::error('Failed to generate or save invoice: ' . $e->getMessage());
        }
    }
}
