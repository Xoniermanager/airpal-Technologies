<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstantController extends Controller
{
// 
  public function instant()
  {
    return view('frontend.pages.instant');
  }
}
