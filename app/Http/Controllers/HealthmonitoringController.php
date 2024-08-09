<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthMonitoringController extends Controller
{
    //// 
  public function health_monitoring()
  {
    return view('website.pages.health_monitoring');
  }
}
