<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->isDoctor()) {
                return redirect()->route('doctor.doctor-dashboard.index');
            } elseif ($user->isPatient()) {
                return redirect()->route('patient.dashboard');
            } elseif ($user->isAdmin()) {
                return redirect()->route('admin.dashboard.index');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
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
