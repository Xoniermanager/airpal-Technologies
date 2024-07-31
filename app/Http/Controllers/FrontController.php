<?php

namespace App\Http\Controllers;

use App\Models\BookingSlots;
use Illuminate\Http\Request;

class FrontController extends Controller
{
  // 
  public function privacy()
  {
    return view('frontend.pages.privacy');
  }
  // 
  public function term()
  {
    return view('frontend.pages.term');
  }
  // 
  public function invoice()
  {
    return view('frontend.pages.invoice');
  }
  // 
  public function patient_details()
  {
    return view('frontend.pages.patient_details');
  }
  // 
  public function success()
  {
    return view('frontend.pages.success');
  }
  // 
  public function checkout()
  {
    return view('frontend.pages.checkout');
  }


  public function testing()
  {

    $bookingDetail = BookingSlots::find(107);
    return view('invoice.invoice-template',compact('bookingDetail'));
  }
}
