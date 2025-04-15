<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
{
return Notification::where('user_id', auth()->id())->latest()->get();
}
public function markAsRead($id)
{
$notification = Notification::findOrFail($id);
$notification->update(['read' => true]);
return response()->json(['message' => 'Marked as read']);
}
}
