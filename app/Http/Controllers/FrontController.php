<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
  // 
  public function privacy()
  {
    return view('pages.privacy');
  }
  // 
  public function term()
  {
    return view('pages.term');
  }
  // 
  public function invoice()
  {
    return view('pages.invoice');
  }
  // 
  public function patient_details()
  {
    return view('pages.patient_details');
  }
  // 
  public function success()
  {
    return view('pages.success');
  }
  // 
  public function checkout()
  {
    return view('pages.checkout');
  }
}
