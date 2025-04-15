<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
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
public function login(Request $request)
{
if (Auth::attempt($request->only('email', 'password'))) {
return response()->json(['token' =>
auth()->user()->createToken('api')->plainTextToken]);
}
return response()->json(['message' => 'Invalid credentials'], 401);
}
public function logout(Request $request)
{
$request->user()->currentAccessToken()->delete();
return response()->json(['message' => 'Logged out']);
}
}
