<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Services\AuthServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthCheckRequest;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthServices $authService)
    {
        $this->authService = $authService;
    }

    public function login(AuthCheckRequest $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            $response    = $this->authService->login($credentials);
            return response()->json([
                'status' => $response['status'],
                'message' => $response['message']
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function resendOtp(AuthCheckRequest $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            $response    = $this->authService->resendOtp($credentials);
            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        try {
            $response = $this->authService->logout();
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while logging out.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        try {
            $response = $this->authService->verifyOTP($request->all());
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while logging in.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function forgetPasswordSendOtp(Request $request)
    {
        try {
            $response = $this->authService->forgetPasswordSendOtp($request->all());
            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp'   => 'required|integer',
            'new_password' => 'required|string|confirmed',
            'new_password_confirmation' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $response = $this->authService->forgetPassword($request->only('email', 'otp', 'new_password'));
            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
