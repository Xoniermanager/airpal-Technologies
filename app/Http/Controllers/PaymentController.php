<?php

namespace App\Http\Controllers;

use App\Http\Services\BookingServices;
use Illuminate\Http\Request;
use App\Http\Services\PaypalService;
use App\Http\Services\PaymentService;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{  
    private $paypalService;
    private $paymentService;
    private $bookingServices;

    public function __construct(PaypalService $paypalService, PaymentService $paymentService, BookingServices $bookingServices)
    {
        $this->paypalService = $paypalService;
        $this->paymentService  = $paymentService;
        $this->bookingServices = $bookingServices;
    }
    /**
     * Capture paypal payment status and other details
     */
    public function paymentSuccess(Request $request)
    {
        $paypalToken = $request->query('token') ?? '';

        if(empty($paypalToken))
        {
            return;
            // Redirect user to error page
        }

        // Get the payment details based on provided token
        $paymentDetails = $this->paypalService->getPaymentDetails($paypalToken);
        if($paymentDetails['status'])
        {
            \Log::info("Start save details : " . json_encode($paymentDetails['paymentDetails']));
            // There was no error and payment details has been retrieved
            // Now lets save the payment details and redirect the user to thanks you page
            $savedPaymentDetails = $this->paymentService->updatePaymentDetails($paymentDetails['paymentDetails']);
            
            if($savedPaymentDetails)
            {
                $url = route('booking.success', ['booking' => Crypt::encrypt($savedPaymentDetails->booking_id)]);

                return redirect($url);
                // ->with('message','Payment has been received successfully and the appointment and book booked!');
            }
        }
        else
        {
            // There was some error with provided token
            // Now lets redirect the user to error page
            return [
                'status'            =>  false,
                'payment_status'    =>  'Invalid token. Something went wrong!'
            ];
        }
    }

    /**
     * Update payment status for cancelled webhook
     */
    public function paymentCancel(Request $request)
    {
        $paypalToken = $request->query('token') ?? '';

        if(empty($paypalToken))
        {
             // Get the payment details based on provided token
            $paymentDetails = $this->paypalService->getPaymentDetails($paypalToken);
        }

        // Update the payment status as cancelled
        $updatedPaymentDetails = $this->paymentService->updatePaymentStatus('Cancelled');

        // Now cancel the appointment as well as the payment has been cancelled
        $updatedBookingDetails = $this->bookingServices->updateStatus('cancelled',$updatedPaymentDetails->booking_id);

        $url = route('booking.error', ['booking' => Crypt::encrypt($updatedPaymentDetails->booking_id)]);

        return redirect($url);
    }
}