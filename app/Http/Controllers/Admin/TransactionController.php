<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\PaymentService;

class TransactionController extends Controller
{
    private $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    public function transactionsList()
    {
        $allPaymentDetails = $this->paymentService->all();
        return view('admin.transactions-list',compact('allPaymentDetails'));
    }
}
