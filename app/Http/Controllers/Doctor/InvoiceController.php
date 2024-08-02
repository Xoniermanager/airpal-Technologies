<?php

namespace App\Http\Controllers\Doctor;

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
        return view('doctor.doctor-invoices', ['doctorDetails' => $doctorDetails ,'invoiceDetails' => $invoiceDetails]);
    }
}
