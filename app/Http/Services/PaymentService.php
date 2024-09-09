<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Repositories\BookingRepository;
use App\Http\Repositories\PaymentRepository;

class PaymentService
{
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }


    public function updatePaymentDetails($paymentDetails)
    {
        $paymentId = Session::get('payment_id');
        
        // Check if entry already exists
        $exists = $this->paymentRepository->where('id',$paymentId)->count();
        // \Log::info('Exists Counter : ' . $exists);
        if($exists)
        {
            // \Log::info('update data : ' . json_encode($paymentDetails));
            $record = $this->paymentRepository->where(['id' =>  $paymentId])->update($paymentDetails);
            return $this->paymentRepository->where('id',$paymentId)->first();
        }
        else
        {
            // Add script to redirect user to error page
        }
        
    }

    public function updatePaymentStatus($status)
    {
        $paymentId = Session::get('payment_id');
        
        // Check if entry already exists
        $exists = $this->paymentRepository->where('id',$paymentId)->count();

        if($exists)
        {
            // \Log::info('update data : ' . json_encode($paymentDetails));
            $record = $this->paymentRepository->where(['id' =>  $paymentId])->update(['payment_status'  =>  $status]);
            return $this->paymentRepository->where('id',$paymentId)->first();
        }
    }

    public function savePaymentDetails($payload)
    {
        return $this->paymentRepository->create($payload);
    }
}