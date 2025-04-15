<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function getNotifications(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'notifications' => $user->notifications,
        ]);
    }
}