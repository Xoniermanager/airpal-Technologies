<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\AuthServices;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthCheckRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ChangePasswordRequest;

class AuthController extends Controller
{

    protected $authService;
    public function __construct(AuthServices $authService)
    {
        $this->authService = $authService;
    }


    public function index()
    {
        return view('website.pages.login');
    }
    public function login(AuthCheckRequest $request)
    {
        try {
            $credentials  =  $request->only('email', 'password');
            $user         =  User::where('email', $credentials['email'])->first();
            $redirectUrl  =  route('admin.login.index');

            // Check if the user exists and if they are a Super Admin (role_id = 1)
            if ($user && $user->role == config('airpal.roles.admin')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Super Admin should log in via the Super Admin login page.',
                    'redirect_url' => $redirectUrl
                ]);
            } else {
                $response = $this->authService->login($credentials);
            }
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


    public function logout(Request $request)
    {
        if (Auth::guard('doctor')->check()) {
            Auth::guard('doctor')->logout(); // Logout the doctor
        } elseif (Auth::guard('patient')->check()) {
            Auth::guard('patient')->logout(); // Logout the patient
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout(); // Logout the admin
        }

        return redirect()->route('login'); // Redirect to login page after logout
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
        return view('website.pages.account.forgot-password');
    }

    public function resetPasswordIndex(Request $request)
    {
        $email = $request->query('email');
        return view('website.pages.account.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'                     => 'required|email|exists:users,email',
            'otp'                       => 'required|integer|max:4',
            'new_password'              => 'required|string|confirmed',
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
                return redirect()->route('login.index');
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

    public function verifyOtp(Request $request)
    {
        try {
            $response = $this->authService->verifyOTP($request->all());
            if ($response['success'] == true) {
                $user = User::where('email', $request->email)->first();
                if ($user->role == 1) {
                    $redirectUrl =  route('admin.dashboard.index');
                } elseif ($user->role == 2) {
                    $redirectUrl =  route('doctor.doctor-dashboard.index');
                } elseif ($user->role == 3) {
                    $redirectUrl =  route('patient-dashboard.index');
                } 
                return response()->json([
                    'success' => true,
                    'message' => 'otp verified successfully',
                    'redirectUrl' => $redirectUrl,
                ], 200);
            }
            // return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while logging in.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function verifyOtpIndex(Request $request)
    {
        return view('website.pages.verify_otp', ['credentials' => $request->all()]);
    }

    public function  resendOtp(Request $request)
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
}
