<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
  
  private $user_services;


  public function __construct(UserServices $user_services )
  {
       $this->user_services = $user_services;

  }
public function profile($id)
{
  $doctor = $this->user_services->getDoctorDataById($id);
  return view('admin.profile',['doctor'=> $doctor]);
}

}
