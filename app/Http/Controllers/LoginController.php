<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //     
  public function login()
  {
    return view('pages.login');
  }
      
  public function forgotPassword()
  {
    return view('pages.forgot-password');
  }
   
}
