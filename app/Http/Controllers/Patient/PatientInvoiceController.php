<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\InvoiceServices;

class PatientInvoiceController extends Controller
{
    private $invoiceServices;

    public function __construct(InvoiceServices $invoiceServices)
    {
        $this->invoiceServices = $invoiceServices;
    }
    public function index()
    {
        $patientInvoices = $this->invoiceServices->getAllPatientInvoice(Auth::id());
        return view('patients.invoices.patient-invoices',['patientInvoices' => $patientInvoices]); 
    }
}
