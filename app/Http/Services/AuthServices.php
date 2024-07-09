<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserOtp;
use App\Jobs\SendOtpJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\RateLimiter;


class AuthServices
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $credentials)
    {
        $user = $this->userRepository->where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            return $this->sendOtp($user, $credentials['email']);
        }
        return [
            'status' => 422,
            "success" => false,
            "message" => "Invalid credentials!"
        ];
    }

    public function resendOtp(array $credentials)
    {
        $user = $this->userRepository->where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            return $this->sendOtp($user, $credentials['email']);
        }
    
        return [
            'status' => 422,
            "success" => false,
            "message" => "Invalid credentials!"
        ];
    }

    private function sendOtp($user, $email)
    {
        $code    = $this->generateOtp($user->id);
        $update  = UserOtp::updateOrCreate(['user_id' => $user->id], ['otp' => $code]);
        if ($update) {
            $mailData = [
                'email' => $email,
                'otp' => $code,
            ];
            if (SendOtpJob::dispatch($mailData)) {
                return ['status' => 200, 'success' => true, 'message' => 'OTP sent on mail'];
            } else {
                return ['status' => 500, 'success' => false, 'message' => 'Error while sending mail'];
            }
        }
    }

    public function logout()
    {
        $user = auth()->guard('doctor_api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Token not found or invalid.',
                "status"  => 401,
            ], 401);
        }
        $user->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'You have been logged out.',
            "status"  => 200,
        ]);
    }
    public function forgetPasswordSendOtp($data)
    {
        $email = $data['email'];
        if (RateLimiter::tooManyAttempts('otp:'.$email, 10)) {
            return [
                'status' => 429,
                'success' => false,
                'message' => 'Too many requests. Please try again later.'
            ];
        }
        $user = $this->userRepository->where('email', $email)->first();
        if ($user) {
            $this->sendOtp($user, $email);
            RateLimiter::hit('otp:'.$email);
            return [
                'status' => 200,
                'success' => true,
                'message' => 'OTP sent successfully!'
            ];
        } else {
            return [
                'status' => 422,
                'success' => false,
                'message' => 'User not found!'
            ];
        }
    }

    public function generateOtp($userId)
    {
        $code = rand(1000, 9999);
        UserOtp::updateOrCreate(
            ['user_id' => $userId],
            ['otp' => $code]
        );
        return $code;
    }

    public function verifyOTP($data)
    {
        $credentials = [
            "email"    =>  $data['email'],
            "password" =>  $data['password'],
        ];
        $user = $this->userRepository->where('email', $data['email'])->first();
        if ($user) {
            $checkOtp  = UserOtp::where(['user_id' => $user->id, 'otp' => $data['otp']])
                ->where('updated_at', '>=', now()->subMinutes(2))
                ->first();
            if (isset($checkOtp)) {
                if (Auth::attempt($credentials)) {
                    $user->access_token = $user->createToken("AirPal TOKEN")->plainTextToken;
                    return [
                        "success" => true,
                        "status"  => 200,
                        "user"    => $user->access_token,
                        "message" => "You have logged in successfully"
                    ];
                }
            } else {
                return [
                    "success" => false,
                    "status"  => 400,
                    "message" => "Invalid Otp "
                ];
            }
        } else {
            return [
                "success" => false,
                "status"  => 400,
                "message" => "Invalid credentials!"
            ];
        }
    }

public function forgetPassword(array $data)
{
    $email = $data['email'];
    $otp   = $data['otp'];
    $newPassword = $data['new_password'];

    $user = $this->userRepository->where('email', $email)->first();
    if ($user) {
        $validOtp = UserOtp::where([
            'user_id' => $user->id,
            'otp' => $otp
        ])->where('updated_at', '>=', now()->subMinutes(2)) // Assuming OTP is valid for 5 minutes
        ->first();

        if ($validOtp) {
            $user->password = bcrypt($newPassword);
            $user->save();

            $validOtp->delete();
            return [
                "success" => true,
                "status" => 200,
                "message" => "Password reset successfully. You can now log in with your new password."
            ];
        } else {
            return [
                "success" => false,
                "status" => 400,
                "message" => "Invalid or expired OTP."
            ];
        }
    } else {
        return [
            "success" => false,
            "status" => 400,
            "message" => "User not found."
        ];
    }
}

}
