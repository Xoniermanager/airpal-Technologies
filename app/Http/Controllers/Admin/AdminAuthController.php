<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthCheckRequest;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('admin.admin-login');
    }
    public function login(AuthCheckRequest $request){
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                if(auth()->user()->role == 1)
                {
                    return response()->json([
                        "success"  => true,
                        "message"  => "Admin logged in successfully!"
                    ]);
                }

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
}
