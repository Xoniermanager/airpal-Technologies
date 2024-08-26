<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Requests\MailCheck;
use App\Http\Services\AuthServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthCheckRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ChangePasswordRequest;

class DoctorAuthenticationController extends Controller
{
    protected $authService;
    public function __construct(AuthServices $authService)
    {
        $this->authService = $authService;
    }
    public function doctorLogin()
    {
        return view('doctor.account.doctor-login');
    }
    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|exists:users,email',
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

        return redirect(route('login.index'));
    }

    public function forgetPasswordSendOtp(Request $request)
    {
        $validator = Validator::make($request->only('email'), [
            'email'   => 'required|string|exists:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $email = $request->input('email');
        try {
            $response = $this->authService->forgetPasswordSendOtp($request->all());
            if ($response['success'] == true) {
                return redirect()->route('reset.password.index', compact('email'));
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function forgetPasswordIndex()
    {
        return view('website.pages.forgot-password');
    }

    public function resetPasswordIndex(Request $request)
    {
        $email = $request->query('email');
        return view('doctor.account.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'   => 'required|string',
            'otp'   => 'required|integer',
            'new_password' => 'required|string|confirmed',
            'new_password_confirmation' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $response = $this->authService->forgetPassword($request->only('email', 'otp', 'new_password'));
            if ($response['success'] == true) {
                return redirect()->route('doctor.doctor-login.index');
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $credential =  $request->validated();
        try {
            $response = $this->authService->changePassword($request->doctorId, $credential['password'],);
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
