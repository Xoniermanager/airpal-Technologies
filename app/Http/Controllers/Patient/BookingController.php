<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\BookingServices;

class BookingController extends Controller
{
    private $bookingServices;
    public function __construct(BookingServices $bookingServices) {
        $this->bookingServices = $bookingServices;
     }
    public function patientBooking(Request $request)
    {
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
    public function checkAuth()
{
    if (Auth::check()) {
        return response()->json(['authenticated' => true]);
    } else {
        return response()->json(['authenticated' => false]);
    }
}



}
