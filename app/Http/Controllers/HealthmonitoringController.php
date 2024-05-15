<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthmonitoringController extends Controller
{
    //// 
  public function health_monitoring()
  {
    return view('pages.health_monitoring');
  }
}
