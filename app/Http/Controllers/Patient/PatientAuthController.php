<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePatientRegistrationRequest;

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

  public function signUp(StorePatientRegistrationRequest $request)
  {
    try {
      $userCreated = $this->userRepository->create([
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name ?? '',
        'phone'      => $request->phone_number,
        'password'   => Hash::make($request->password),
        'email'  => $request->email,
        'gender' => $request->gender,
        'role'   => 3,
      ]);

      if ($userCreated) {
        return response()->json([
          "success"   => true,
          "redirect_url" => route('patient.login.index'),
          "message" => "Patient successfully registered!"
        ]);
      }
    } catch (\Exception $e) {
      return response()->json(
        [
          'message' => 'An error occurred while updating the patient profile.',
          'status'  => 'false',
          'error'   => $e->getMessage()
        ],
        500
      );
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
