<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PaymentService;

class PatientPaymentController extends Controller
{
    private $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function patientAccounts()
    {
        $allPaymentDetails = $this->paymentService->getPaymentDetailsByPatientId(Auth::user()->id);
        return view('patients.payment.index', compact('allPaymentDetails'));
    }
    public function searchFilterDetails(Request $request)
    {
        $allPaymentDetails = $this->paymentService->getPaymentDetailsByPatientId(Auth::guard()->user()->id, $request->all());
        return response()->json([
            'success' => 'Searching',
            'data'    =>  view('patients.payment.list', compact('allPaymentDetails'))->render()
        ]);
    }
}
