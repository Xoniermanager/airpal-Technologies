<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\UserOtp;
use App\Jobs\SendOtpJob;
use App\Mail\SendMailToUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class AuthServices
{
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user   = Auth::guard('doctor_api')->user();
            $code   = $this->generateOtp();
            $update = UserOtp::updateOrCreate(['user_id' => $user->id], ['otp'  => $code]);
            if ($update) {
                $mailData = [
                    'email' => $credentials['email'],
                    'otp'   => $code,
                ];

                // $checkValid = Mail::to("xonier.puneet@gmail.com")->send(new SendMailToUser($mailData));
                if (SendOtpJob::dispatch($mailData))
                    return ['status' => true, 'message' => 'Otp sent on mail'];
                else
                    return ['status' => false, 'message' => 'Error while sending mail'];
            }
        }
        return [
            "success" => false,
            "message" => "Invalid credentials!"
        ];
    }

    public function logout()
    {
        $user = auth()->guard('doctor_api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Token not found or invalid.'
            ], 401);
        }
        $user->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'You have been logged out.'
        ]);
    }

    public function generateOtp()
    {
        $code = rand(1000, 9999);
        UserOtp::updateOrCreate(
            ['user_id' => auth()->user()->id],
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
        if (Auth::attempt($credentials)) {
            $user   = Auth::guard('doctor_api')->user();
            $getOtp = UserOtp::where(['user_id' => $user->id, 'otp' => $data['otp']])
                ->where('updated_at', '>=', now()->subMinutes(1))
                ->first();
            if (isset($getOtp)) {
                $user->access_token = $user->createToken("AirPal TOKEN")->plainTextToken;
                return [
                    "success" => true,
                    "user" => $user->access_token,
                    "message" => "You have logged in successfully"
                ];
            } else {
                return [
                    "success" => false,
                    "message" => "Token Expire"
                ];
            }
        } else {
            return [
                "success" => false,
                "message" => "Invalid credentials!"
            ];
        }
    }




}
