<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstantController extends Controller
{
// 
  public function instant()
  {
    return view('website.pages.instant');
  }
}
