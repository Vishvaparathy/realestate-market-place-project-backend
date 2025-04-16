<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Otp;
use Illuminate\Support\Facades\Log;



class AuthController extends Controller
{
    //register
    public function register(Request $request)
{
$user = User::create([
'name' => $request->name,
'phone' => $request->phone,
'email' => $request->email,
'password' => bcrypt($request->password),
]);
return response()->json(['user' => $user], 201);
}

//login
public function login(Request $request)
{
    // Validate the request to ensure 'email' and 'password' are provided
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    // Attempt authentication
    if (Auth::attempt($request->only('email', 'password'))) {
        // Generate and return an API token for the user
        $user = Auth::user();
        $token = $user->createToken('api')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user'  => $user, // Optionally return user details
        ]);
    }

    // If authentication fails, return a response with an error message
    return response()->json(['message' => 'Invalid credentials'], 401);
}




//send otp
public function sendOtp(Request $request)
{
    $request->validate([
        'phone' => 'required|digits:10'
    ]);

    $otpCode = rand(100000, 999999);

    Otp::updateOrCreate(
        ['phone' => $request->phone],
        ['otp' => $otpCode, 'expires_at' => now()->addMinutes(5)]
    );

    // Simulate sending via SMS
    Log::info("OTP for {$request->phone}: {$otpCode}");

    return response()->json(['message' => 'OTP sent successfully']);
}

//verify otp
public function verifyOtp(Request $request)
{
    $request->validate([
        'phone' => 'required|string',
        'otp'   => 'required|string',
    ]);

    $otpRecord = Otp::where('phone', $request->phone)
                    ->where('otp', $request->otp)
                    ->where('expires_at', '>', now())
                    ->first();

    if ($otpRecord) {
        // OTP verified, you can log the user in or do whatever next
        return response()->json(['message' => 'OTP verified successfully'], 200);
    } else {
        return response()->json(['message' => 'Invalid or expired OTP'], 401);
    }
}



//logout
public function logout(Request $request)
{
$request->user()->currentAccessToken()->delete();
return response()->json(['message' => 'Logged out']);
}

}
