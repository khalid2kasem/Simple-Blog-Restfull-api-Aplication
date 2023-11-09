<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response as HttpResponse;
use App\Http\Helpers\ApiResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();
        $token = $user->createToken($user->name)->plainTextToken;

        return ApiResponse::make(
            success: true,
            message: 'Logged In Successfully',
            data: ['token' => $token, 'token_name' => $user->name],
            statusCode: HttpResponse::HTTP_OK
        );
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
