<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class PatientAuthController extends Controller
{   
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
      $this->userRepository = $userRepository;
    }

    public function login()
    {
        return view('frontend.pages.login');
    }
    public function register()
    {
      return view('frontend.pages.register');
    }

    public function signUp(Request $request){
    
        $validator = Validator::make($request->all(), [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'phone_number' => 'required',
          'password' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        }
        $userCreated = $this->userRepository->create([
            'first_name' => $request->name,
            'phone' => $request->phone_number,
            'role' => 3,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => "Male",
         ]);
        if($userCreated)
        {
          return redirect()->route('patient.login.index');
            // response()->json([
            //     "success"   => true,
            //     "message" => "Patient successfully registered!"
            // ]);
 
        }
      }

      public function patientLogin(Request $request)
      {
          $validator = Validator::make($request->all(), [
              'email'    => 'required',
              'password' => 'required',
          ]);
  
          if ($validator->fails()) {
              return redirect()->back()
                  ->withErrors($validator)
                  ->withInput();
          }
          try {
              $credentials = $request->only('email', 'password');
              if (Auth::attempt($credentials)) {

                return redirect()->route('patient-dashboard.index');
                //   return response()->json([
                //       "success"   => true,
                //       "message" => "Doctor logged in successfully!"
                //   ]);
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
          return redirect(route('patient.login.index'));
      }



}
