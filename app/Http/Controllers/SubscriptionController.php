<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
{
return Subscription::where('user_id', auth()->id())->get();
}
public function subscribe(Request $request)
{
$sub = Subscription::updateOrCreate(
['user_id' => auth()->id()],
[
'plan' => $request->plan,
'expires_at' => now()->addMonth(),
]
);
return response()->json(['subscription' => $sub]);
}
}
