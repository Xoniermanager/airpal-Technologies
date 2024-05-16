<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class DoctorController extends Controller
{
  // 
  public function doctors()
  {
    return view('pages.doctors');
  }
  // 
  public function doctor_profile()
  {
    return view('pages.doctor_profile');
  }
  // 
  public function appointment()
  {
    return view('pages.appointment');
  }
}
