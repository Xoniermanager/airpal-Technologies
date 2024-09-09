<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\PaypalService;
use App\Http\Services\PaymentService;
use Illuminate\Support\Facades\Crypt;
use App\Http\Services\BookingServices;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\GetBookingFeeAndCheckAuth;

class PaymentApiController extends Controller
{
    private $bookingServices;
    private $paypalService;
    private $paymentService;

    public function __construct(BookingServices $bookingServices, PaypalService $paypalService, PaymentService $paymentService)
    {
        $this->bookingServices = $bookingServices;
        $this->paypalService = $paypalService;
        $this->paymentService = $paymentService;
    }

    public function checkPaymentRequiredForBooking(GetBookingFeeAndCheckAuth $request)
    {
        $bookingDate = $request->booking_date;
        $slotStartTime = $request->slot_start_time;
        $slotEndTime = $request->slot_end_time;
        $doctorId = $request->doctor_id;

        $paramsToGetBookingFee = [
            'doctorId'      =>  $doctorId,
            'slotStartTime' =>  $slotStartTime,
            'slotEndTime'   =>  $slotEndTime,
            'bookingDate'   =>  $bookingDate
        ];

        $amount = $this->bookingServices->getBookingFee($paramsToGetBookingFee);
        $bookingFee = $amount . ' USD';


        return response()->json([
            'status'    => true,
            'message'   => "Payment details retrieved successfully!",
            'data'      =>  $bookingFee
        ], 200);
    }


    /**
     * Capture payment details using paypal token and update all details in payments table
     */
    public function updatePaymentDetails(Request $request)
    {
        $paypalToken = $request->query('token') ?? '';
        $paymentId =  Session::get('payment_id') ?? '';

        if(empty($paypalToken))
        {
            return response()->json([
                "status"    => false,
                "error"     =>  'Invalid token',
                "message"   => "Unable to get payment details"
            ], 500);
        }

        // Get the payment details based on provided token
        $paymentDetails = $this->paypalService->getPaymentDetails($paypalToken);

        if($paymentDetails['status'])
        {
            // There was no error and payment details has been retrieved
            // Now lets save the payment details and redirect the user to thanks you page
            $savedPaymentDetails = $this->paymentService->updatePaymentDetails($paymentDetails['paymentDetails'], $paymentId);
            
            if($savedPaymentDetails)
            {
                // Return with booking and payment details and status as true
                return response()->json([
                    'status'    =>  true,
                    'data'      =>  [
                        'payment'   =>  $savedPaymentDetails,
                        'booking'   =>  $this->bookingServices->getBookingSlotById($savedPaymentDetails->booking_id)->first()
                    ],
                    'message'   =>  "Payment details updated successfully!"
                ], 200);
            }
        }
        else
        {
            // There was some error with provided token
            // Now lets redirect the user to error page
            return response()->json([
                'status' => true,
                'message' => 'Invalid token. Something went wrong!'
            ], 400);
        }
    }

    /**
    *   Update status for cancelled payments
    */
    
    public function updatePaymentStatus(Request $request)
    {
        $paypalToken = $request->query('token') ?? '';

        if(empty($paypalToken))
        {
             // Get the payment details based on provided token
            $paymentDetails = $this->paypalService->getPaymentDetails($paypalToken);
        }

        // Update the payment status as cancelled
        $updatedPaymentDetails = $this->paymentService->updatePaymentStatus('Cancelled');

        // Now cancel the appointment because the payment has been cancelled
        $updatedBookingDetails = $this->bookingServices->updateStatus('cancelled',$updatedPaymentDetails->booking_id);

        // Return with booking and payment details and status as true
        return response()->json([
            'status'    =>  true,
            'data'      =>  [
                'payment'   =>  $updatedPaymentDetails,
                'booking'   =>  $this->bookingServices->getBookingSlotById($updatedPaymentDetails->booking_id)->first()
            ],
            'message'   =>  "Payment status updated successfully!"
        ], 200);
    }
}
