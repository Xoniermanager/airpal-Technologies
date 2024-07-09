<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Services\AuthServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthCheckRequest;
use App\Http\Requests\MailCheck;
use Illuminate\Support\Facades\Validator;

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
    public function userLogin(AuthCheckRequest $request)
    {
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

    public function forgetPasswordIndex()
    {
        return view('doctor.account.forgot-password');
    }

    public function forgetPasswordSendOtp(MailCheck $request)
    {
        try {
            $response = $this->authService->forgetPasswordSendOtp($request->all());
            if ($response) {
                return redirect()->route('reset.password.index');
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
