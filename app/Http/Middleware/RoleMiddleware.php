<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {

        $roleMap = [
            'admin'   => ['id' => 1, 'login_route' => 'admin.login.index'],
            'doctor'  => ['id' => 2, 'login_route' => 'patient.login.index'],
            'patient' => ['id' => 3, 'login_route' => 'patients.login'],
        ];

        // Check if the role exists in the map
        if (!array_key_exists($role, $roleMap)) {
            abort(403, 'Unauthorized action.');
        }

        $roleId = $roleMap[$role]['id'];
        $loginRoute = $roleMap[$role]['login_route'];

        // Check if user is authenticated and has the correct role
        if (!Auth::check() || Auth::user()->role != $roleId) {
            return redirect()->route($loginRoute);
        }

        return $next($request);
    }
    
}
