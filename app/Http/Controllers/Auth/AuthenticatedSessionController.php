<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response
    {
        $request->authenticate();

//        $request->session()->regenerate();

        $user = Auth::user();

        $response = [
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ];

        return response($response, 201);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {

        auth()->user()->tokens()->delete();

        Auth::guard('web')->logout();

//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();

        return response([
            'status' => 201,
            'message' => 'Logged out successfully.'
        ]);
    }
}
