<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;

class InstantController extends Controller
{
  private $user_services;

  public function __construct(UserServices $user_services) {
    $this->user_services =  $user_services;
  }
  public function instant()
  {
    $doctors =  $this->user_services->getDoctorDataForFrontend();
    return view('website.pages.instant',['doctorList' => $doctors]);
  }
}
