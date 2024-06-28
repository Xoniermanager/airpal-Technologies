<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthmonitoringController extends Controller
{
    //// 
  public function health_monitoring()
  {
    return view('frontend.pages.health_monitoring');
  }
}
