<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Handle Google callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Random password
                    'email_verified_at' => now(),
                    'avatar' => $googleUser->getAvatar(),
                ]
            );

            // Generate Sanctum token
            $token = $user->createToken('social_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'user' => $user,
                'token' => $token
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Login failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
