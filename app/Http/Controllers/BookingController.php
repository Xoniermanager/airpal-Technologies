<?php

namespace App\Http\Controllers;

use App\Http\Services\BookingServices;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $bookingServices;
    public function __construct(BookingServices $bookingServices) {
        $this->bookingServices = $bookingServices;
     }
    public function patientBooking(Request $request)
    {
        //  dd($request->all());
        $bookedSlot = $this->bookingServices->store($request);
      
        if ($bookedSlot) {
            return response()->json([
                'success' => 'true',
                'data'    => $bookedSlot,
                'status'  => 200

            ]);
        } else {
            return response()->json(['error' => 'Something Went Wrong!! Please try again']);
        }
    }


}
