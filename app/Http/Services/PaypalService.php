<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Http\Repositories\BookingRepository;
use Srmklive\PayPal\Services\PayPal as PaypalClient;


class PaypalService
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generatePaymentLink($amount, $bookingDetails, $returnUrls)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        \Log::info('Paypal payment id : ' . json_encode($paypalToken));
        return $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" =>  [
                "return_url" => $returnUrls['success'],
                "cancel_url" => $returnUrls['cancel'],
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "booking_id"    =>  "tester123",
                        "currency_code" =>  "USD",
                        "value"         =>  "{$amount}"
                    ]
                ]
            ]
        ]);
    }


    /**
     * Get payment status and other details after hitting on success page
     * Save payment details on payment table
     */
    public function getPaymentDetails($paypalToken)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($paypalToken);
        // dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') 
        {
            $paypalPaymentId = $response['id'] ?? '';
            $paymentDetails = [];
            $paymentDetails['payment_details'] = json_encode($response);
            $paymentDetails['payment_status'] = $response['status'];
            $payerDetails = $response['payer'];
            $paymentDetails['payer_name'] = $payerDetails['name']['given_name'] . ' ' . $payerDetails['name']['surname'] ?? '';
            $paymentDetails['payer_email'] = $payerDetails['email_address'] ?? '';
            // $paymentDetails['payer_address'] = json_encode($payerDetails['address']);
            $paymentDetails['amount'] = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'] ?? '';
            $paymentDetails['currency'] = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'] ?? '';

            return [
                'status'            =>  true,
                'paypalPaymentId'   =>  $paypalPaymentId,
                'paymentDetails'    =>  $paymentDetails
            ];
        } 
        else 
        {
            return [
                'status'        =>  false,
                'message'       =>  $response['message'] ?? 'Something went wrong.'
            ];
        }
    }
}