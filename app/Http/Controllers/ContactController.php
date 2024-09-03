<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactUsRequest;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
  // 
  public function contact()
  {
    return view('website.pages.contact');
  }
  public function contactUs(ContactUsRequest $request)
  {
    $sendMail = Mail::to("xonier.puneet@gmail.com")->send(new ContactUs($request->all()));
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

  public function thankYou()
  {
    return view('thankyou');
  }
}
