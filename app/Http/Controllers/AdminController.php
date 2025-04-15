<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Requirement;
use App\Models\Subscription;


class AdminController extends Controller
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function toggleUserStatus($id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active;
        $user->save();
        return response()->json(['status' => 'updated', 'user' => $user]);
    }

    public function pendingProperties()
    {
        return Property::where('status', 'pending')->get();
    }

    public function approveProperty($id)
    {
        $property = Property::findOrFail($id);
        $property->status = 'approved';
        $property->save();
        return response()->json(['message' => 'Property approved']);
    }

    public function deleteProperty($id)
    {
        Property::destroy($id);
        return response()->json(['message' => 'Property deleted']);
    }

    public function getAllRequirements()
    {
        return Requirement::all();
    }

    public function getAllSubscriptions()
    {
        return Subscription::all();
    }

    public function updateSubscription(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return response()->json(['message' => 'Subscription updated']);
    }

    public function analytics()
    {
        return [
            'total_users' => User::count(),
            'total_properties' => Property::count(),
            'pending_properties' => Property::where('status', 'pending')->count(),
            'total_requirements' => Requirement::count()
        ];
    }

    public function reportedListings()
    {
        return Property::where('reported', true)->get();
    }
}
