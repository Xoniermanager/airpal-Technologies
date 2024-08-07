<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;

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
        return view('doctor.invoices.doctor-invoices', ['doctorDetails' => $doctorDetails, 'invoiceDetails' => $invoiceDetails]);
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
            $pdf = PDF::loadView('invoice.invoice-template', ['bookingDetail' => $bookingDetail]);
            return $pdf->download('invoice.pdf');
        } catch (\Exception $e) {
            // Handle the exception, log it or notify the user
            \Log::error('Failed to generate or save invoice: ' . $e->getMessage());
        }
    }

    public function getRevenueDetailForChart(Request $request)
    {
        return $this->bookingServices->gettingRevenueDetailForChart($request->period);
    }
}
