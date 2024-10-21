<?php

namespace App\Http\Controllers;

use App\Models\BookingSlots;
use Illuminate\Http\Request;

class FrontController extends Controller
{
  // 
  public function privacy()
  {
    return view('website.pages.privacy');
  }
  // 
  public function term()
  {
    return view('website.pages.term');
  }
  // 
  public function invoice()
  {
    return view('website.pages.invoice');
  }
  // 
  public function patient_details()
  {
    return view('website.pages.patient_details');
  }
  // 
  public function success()
  {
    return view('website.pages.success');
  }
  // 
  public function checkout()
  {
    return view('website.pages.checkout');
  }

  public function research()
  {
    return view('website.pages.research');
  }  
}
