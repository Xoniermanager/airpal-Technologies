<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserServices;
use App\Mail\InstantConsultSendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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

  public function instantSendMail(Request $request)
  {
      // Validator for custom validation
      $validator = Validator::make($request->all(), [
          'name' => 'required|string|max:255',
          'phone' => 'required|digits:10',
          'disease' => 'required|string|max:255',
      ]);
  
      // If validation fails, return error response
      if ($validator->fails()) {
          return redirect()->back()
              ->withErrors($validator)  // Send validation errors back to the form
              ->withInput();            // Keep old input values
      }
  
      // If validation passes, send the email
      $sendMail = Mail::to('xonier.puneet@gmail.com')->send(new InstantConsultSendMail($validator->validate()));
  
      if ($sendMail) {
        return response()->json([
          'success' => true,
          'message' => 'Mail send successfully'
        ], 200);
      } else {
        return response()->json([
          'success' => false,
          'message' => 'Something went wrong'
        ], 500);
      }
  }
  
}
