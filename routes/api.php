<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/test', function () {
    return response()->json(['status' => 'API is running']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/otp/send', [AuthController::class, 'sendOtp']);
Route::post('/otp/verify', [AuthController::class, 'verifyOtp'])->middleware('auth:sanctum');  // Use sanctum auth guard for token validation
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');  // Logout route, use sanctum for token invalidation

// Social Auth
Route::get('/auth/google/redirect', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

/*
|--------------------------------------------------------------------------
| Protected Routes (auth:sanctum)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    // User Info & Logout
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/notifications', [UserController::class, 'getNotifications']);

    // Property Listings
    Route::get('/properties', [PropertyController::class, 'index']); 
    Route::post('/properties', [PropertyController::class, 'store']);
    Route::get('/properties/{id}', [PropertyController::class, 'show']);
    Route::put('/properties/{id}', [PropertyController::class, 'update']);
    Route::delete('/properties/{id}', [PropertyController::class, 'destroy']);
    Route::post('/properties/{id}/approve', [PropertyController::class, 'approveProperty']);

    // Property Requirements
    Route::post('/requirements', [RequirementController::class, 'store']);
    Route::get('/requirements', [RequirementController::class, 'index']);

    // Subscriptions
    Route::get('/subscriptions', [SubscriptionController::class, 'index']);
    Route::post('/subscriptions/purchase', [SubscriptionController::class, 'purchase']);

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index']);

    // Role-Based Routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', fn() => response()->json(['message' => 'Welcome Admin']));
    });

    Route::middleware('role:registered')->group(function () {
        Route::get('/user/dashboard', fn() => response()->json(['message' => 'Welcome User']));
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->prefix('admin')->group(function () {

        // Users
        Route::get('/users', [AdminController::class, 'getAllUsers']);
        Route::put('/users/{id}/toggle', [AdminController::class, 'toggleUserStatus']);

        // Properties
        Route::get('/properties/pending', [AdminController::class, 'pendingProperties']);
        Route::put('/properties/{id}/approve', [AdminController::class, 'approveProperty']);
        Route::delete('/properties/{id}', [AdminController::class, 'deleteProperty']);

        // Requirements
        Route::get('/requirements', [AdminController::class, 'getAllRequirements']);

        // Subscriptions
        Route::get('/subscriptions', [AdminController::class, 'getAllSubscriptions']);
        Route::put('/subscriptions/{id}', [AdminController::class, 'updateSubscription']);

        // Analytics & Reports
        Route::get('/analytics', [AdminController::class, 'analytics']);
        Route::get('/reports', [AdminController::class, 'reportedListings']);
    });

});
