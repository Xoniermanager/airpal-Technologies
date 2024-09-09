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


    public function updatePaymentDetails($paymentDetails,$paypalPaymentId)
    {   
        // Check if entry already exists
        $exists = $this->paymentRepository->where('paypal_payment_id',$paypalPaymentId)->first();
        // \Log::info('Exists Counter : ' . $exists);
        if($exists)
        {
            // \Log::info('update data : ' . json_encode($paymentDetails));
            $record = $this->paymentRepository->where('paypal_payment_id',$paypalPaymentId)->update($paymentDetails);
            return $this->paymentRepository->where('paypal_payment_id',$paypalPaymentId)->first();
        }
        else
        {
            // Add script to redirect user to error page
        }
        
    }

    public function updatePaymentStatus($status, $paypalPaymentId)
    {        
        // Check if entry already exists
        $exists = $this->paymentRepository->where('paypal_payment_id',$paypalPaymentId)->count();

        if($exists)
        {
            // \Log::info('update data : ' . json_encode($paymentDetails));
            $record = $this->paymentRepository->where('paypal_payment_id',$paypalPaymentId)->update(['payment_status'  =>  $status]);
            return $this->paymentRepository->where('paypal_payment_id',$paypalPaymentId)->first();
        }
    }

    public function savePaymentDetails($payload)
    {
        return $this->paymentRepository->create($payload);
    }

    public function savePaymentDetailsAndExtractPaymentLink($bookedSlot,$paymentLinkDetails, $bookingFee, $paypalPaymentId)
    {
        if (isset($paymentLinkDetails['id']) && $paymentLinkDetails['id'] != null)
        {
            foreach ($paymentLinkDetails['links'] as $links) 
            {
                if ($links['rel'] == 'approve')
                {
                    $paymentDetails = $this->savePaymentDetails([
                        'booking_id'    =>  $bookedSlot->id,
                        'amount'        =>  $bookingFee,
                        'currency'      =>  'USD',
                        'paypal_payment_id' =>  $paypalPaymentId,
                        'payment_status'    =>  'Pending'
                    ]);
                    
                    Session::put('payment_id',$paymentDetails->id);

                    return [
                        'status'        =>  true,
                        'message'       =>  'Payment link retrieved successfully!',
                        'payment_link'  =>  $links['href']
                    ];
                }
            }
            
            return [
                'status'    =>  false,
                'message'   =>  'Something went wrong. Please try later',
                'payment_link'  =>  '',
            ];
        }
        else
        {
            return [
                'status'        =>  false,
                'message'  =>  $paymentLinkDetails['message'] ?? 'Something went wrong.',
                'payment_link'  =>  ''
            ];
        }
    }
}