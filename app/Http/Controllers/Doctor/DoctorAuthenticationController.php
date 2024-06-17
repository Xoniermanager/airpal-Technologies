<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthCheckRequest;
use Illuminate\Support\Facades\Validator;

class DoctorAuthenticationController extends Controller
{
    

    public function doctorLogin()
    {

    return view('doctor.doctor-login');
      
    } 
    public function userLogin(AuthCheckRequest $request){
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return response()->json([
                    "success"   => true,
                    "message" => "Doctor logged in successfully!"
               ]);
            } 
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
  
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flash('success', 'You have been logged out.');

        return redirect(route('doctor.doctor-login'));
    }
  
}
