<?php

namespace App\Http\Controllers\Doctor;

use DateTime;
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
            $doctorId = $bookingDetail->doctor_id;
            $pdf = PDF::loadView('invoice.invoice-template', ['bookingDetail' => $bookingDetail]);
            return $pdf->download('invoice.pdf');
        } catch (\Exception $e) {
            // Handle the exception, log it or notify the user
            \Log::error('Failed to generate or save invoice: ' . $e->getMessage());
        }
    }

    // public function getRevenueDetailForChart()
    // {
    //     $appointments = $this->bookingServices->getAllRecentAppointmentsByDoctorId(auth::id());
    //     // dd($appointments);
    //     foreach ($appointments as $key => $appointment) {
    //         $date = $key;
    //         $sum = 0;
    //         foreach ($appointment as $appointmentData)
    //         {
    //             $amount   =  $appointmentData->payments->amount ?? 0;
    //             $sum     += $amount;
    //             $result[] = [$date, $sum];
    //         }
    //     }
    
    //     dd( $result);
    // }
    public function getRevenueDetailForChart()
{
    $appointments = $this->bookingServices->getAllRecentAppointmentsByDoctorId(auth::id());
    // dd($appointments);

    $result = [];
    $revenueByDate = [];

    foreach ($appointments as $appointment) {
        foreach ($appointment as $appointmentData) {
            $date = $appointmentData->booking_date;
            $amount = $appointmentData->payments->amount ?? 0;
            if (!isset($revenueByDate[$date])) {
                $revenueByDate[$date] = 0;
            }
            $revenueByDate[$date] += $amount;
        }
    }

    foreach ($revenueByDate as $date => $sum) {
        $date = new DateTime($date);
        $day = $date->format('j');
        $result[] = [(int)$day, $sum];
    }
    return $result;
}

}
