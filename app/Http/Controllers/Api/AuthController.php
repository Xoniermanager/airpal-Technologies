<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\AuthServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthCheckRequest;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StorePatientRegistrationRequest;

class AuthController extends Controller
{

    private $userRepository;
    protected $authService;
    public function __construct(UserRepository $userRepository,AuthServices $authService)
    {
      $this->userRepository = $userRepository;
      $this->authService = $authService;
    }

    public function login(AuthCheckRequest $request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            $response    = $this->authService->login($credentials);
            return response()->json([
                'status' => $response['success'],
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

    public function changePassword(ChangePasswordRequest $request)
    {
        dd($request->all());
        $userDetails = Auth::guard('api')->user();
        if (Hash::check($request->old_password, $userDetails->password)) {
            $this->authService->changePassword($userDetails->id, $request->password);
            return response()->json([
                'message' => ' password successfully updated',
                'status' => true
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'old password does not match',
            ], 422);
        }
    }

    public function privacyPolicy()
    {
        try {
            $response = view("privacy")->render();
            return response()->json([
                'success' => true,
                'data' => $response
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function register(StorePatientRegistrationRequest $request)
    {
        try {
            $userCreated = $this->userRepository->create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name ?? '',
                'phone'      => $request->phone,
                'password'   => Hash::make($request->password),
                'email'      => $request->email,
                'gender'     => $request->gender,
                'role'       => config('airpal.roles.patient'),
            ]);

            if ($userCreated) {
                return response()->json([
                    "success"   => true,
                    "message"   => "Patient successfully registered!",
                    "data"      => $userCreated
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
}
