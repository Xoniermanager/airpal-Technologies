<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
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
            $user        = User::where('email', $credentials['email'])->first();
            $redirectUrl = route('login');

            if ($user && $user->role != config('airpal.roles.admin')) {
                return response()->json([
                    'success' => false,
                    'message' => 'you are not super-admin go to common dashboard.',
                    'redirect_url' => $redirectUrl
                ]);
            }
            else
            {            
            if (Auth::attempt($credentials)) {
                if(auth()->user()->role == config('airpal.roles.admin'))
                {
                    return response()->json([
                        "success"  => true,
                        "message"  => "Admin logged in successfully!"
                    ]);
                }
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

        return redirect(route('admin.login.index'));
    }
}
