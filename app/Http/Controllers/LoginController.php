<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\SendMailToUser;
use Illuminate\Support\Facades\Mail;
use Log;


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
  public function userLogin(Request $request){
      $userCredential = $request->only('email','password');

      if(Auth::attempt($userCredential)){
           return redirect('/doctors');
      }
      return back()->with('error','Invalalid Credential');
  }
  public function sendForgetPasswordOtp(Request $request){
    $validator = Validator::make($request->all(), [
      'email' => 'required|string|email|exists:users,email',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }
    //  $isEmailExist = User::where('email', $$request->email)->exists();
     $otp = self::randomNumber();

     // Retrieve the authenticated user
     $user = Auth::user();
      if ($user) {
          $emailToName = $user->name;
          $userEmail  = $user->email;
      }
      $this->sendEmailSendMailToUserForForgotPasswordOtp($userEmail, $emailToName, $otp);
      // dd(Mail::to('mishraarjun03@gmail.com')->send(new SendMailToUser()));
  }
  // ------for random number--------
  public static function randomNumber(){
    return mt_rand(100001, 999999);
  }
  public function sendEmailSendMailToUserForForgotPasswordOtp($toEmailId, $emailToName, $forgotPasswordOtp) {
    $bodyText = 'You have requested to reset your password. Please use the below code to verify your request and reset the password.<br>'
            . '<p>Your verification code is:</p><p style="font-size: 24px;margin-top:5px;"><b> ' . $forgotPasswordOtp . '</b></p>';

    $subject = 'Forget Your Password';
  //  $data = Mail::to($toEmailId)->send(new SendMailToUser());
  //   Log::info($data);
    // return true;

    try {
      Mail::to($toEmailId)->send(new SendMailToUser());
      Log::info('Email sent successfully to: ' . $toEmailId);
  } catch (\Exception $e) {
      Log::error('Error sending email to: ' . $toEmailId . '. Error: ' . $e->getMessage());
  }

}

}
