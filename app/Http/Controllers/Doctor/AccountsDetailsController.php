<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\PaymentService;
use Illuminate\Http\Request;

class AccountsDetailsController extends Controller
{
    private $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    public function doctorAccounts()
    {
        $allPaymentDetails = $this->paymentService->getPaymentDetailsByDoctorId(Auth::user()->id);
        return view('doctor.accounts-details.doctor-accounts', compact('allPaymentDetails'));
    }
    public function searchFilterDetails(Request $request)
    {
        $allPaymentDetails = $this->paymentService->getPaymentDetailsByDoctorId(Auth::guard()->user()->id, $request->all());
        return response()->json([
            'success' => 'Searching',
            'data'    =>  view('doctor.accounts-details.all_list', compact('allPaymentDetails'))->render()
        ]);
    }
}
