<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Mail\WelcomeMailForDoctor;
use App\Http\Services\AuthServices;
use App\Mail\WelcomeMailForPatient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StorePatientRegistrationRequest;

class PatientAuthController extends Controller
{
  private $userRepository;
  protected $authService;
  public function __construct(UserRepository $userRepository,AuthServices $authService)
  {
    $this->userRepository = $userRepository;
    $this->authService = $authService;
  }


  public function login()
  {
    return view('website.pages.login');
  }
  public function register()
  {
    return view('website.pages.register');
  }

  public function signUp(StorePatientRegistrationRequest $request)
  {
    try {
      $userCreated = $this->userRepository->create([
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name ?? '',
        'phone'      => $request->phone,
        'password'   => Hash::make($request->password),
        'email'  => $request->email,
        'gender' => $request->gender,
        'role'   => config('airpal.roles.patient'),
      ]);

      if ($userCreated) {
        if($userCreated->role == 3)
        {
            Mail::to($request->email)->send(new WelcomeMailForPatient($userCreated));
        }
        return response()->json([
          "success"   => true,
          "redirect_url" => route('login.index'),
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
    return redirect(route('login.index'));
  }

  public function changePasswordIndex()
  {
    return view('patients.change-password');
  }

  public function patientChangePassword(ChangePasswordRequest $request)
  {
      $credential =  $request->validated();
      try {
          $response = $this->authService->changePassword(Auth::id(), $credential['password'],);
          if ($response == true) {
              return response()->json([
                  'status'  => 200,
                  'success' => true,
                  'message' => "Password has been changed successfully"
              ], 200);
          }
      } catch (\Throwable $th) {
          return response()->json([
              'success' => false,
              'message' => $th->getMessage()
          ], 500);
      }
  }


}
