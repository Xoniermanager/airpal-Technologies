<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class RegisterController extends Controller
{
    //   
  public function register()
  {
    return view('frontend.pages.register');
  }

  public function userRegister(Request $request){
    
    //  dd($request->all());

    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'phone_number' => 'required',
      'password' => 'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

     User::create([
        'name' => $request->name,
        'phone' => $request->phone_number,
        'email' => $request->email,
        'password' => Hash::make($request->password)
     ]);

     return redirect()->back()->with('Registration Successfully!!');
  }
}
