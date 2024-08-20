<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthCheckRequest;

class AuthController extends Controller
{
    public function login(AuthCheckRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $redirectUrl = '';
    
            if ($user->isDoctor()) {
                $redirectUrl = route('doctor.doctor-dashboard.index');
            } elseif ($user->isPatient()) {
                $redirectUrl = route('patient-dashboard.index');
            } elseif ($user->isAdmin()) {
                $redirectUrl = route('admin.dashboard.index');
            }
    
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'redirect_url' => $redirectUrl,
            ]);
        }
    
        return response()->json([
            'success' => false,
            'message' => 'The provided credentials do not match our records.',
            'errors' => [
                'email' => 'Invalid email or password.'
            ]
        ], 422);
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

}
