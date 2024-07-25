<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    private $userServices;
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }
    public function doctorInvoices()
    {
        $doctorDetails = $this->userServices->getDoctorDataById(auth::id());
        return view('doctor.doctor-invoices', ['doctorDetails' => $doctorDetails]);
    }
}
