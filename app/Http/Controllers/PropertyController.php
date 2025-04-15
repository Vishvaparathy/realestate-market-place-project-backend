<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Notifications\ListingApproved;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    // ✅ List all properties (paginated)
    public function index()
    {
        return Property::latest()->paginate(10);
    }

    // ✅ Create a new property (merged multilingual + base fields)
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'type'            => 'required|string',
            'location'        => 'required|string',
            'price'           => 'required|numeric',
            'size'            => 'required|numeric',
            'bedrooms'        => 'required|integer',
            'bathrooms'       => 'required|integer',
            'listing_type'    => 'required|string',
            'category'        => 'required|string',
            'is_agent'        => 'required|boolean',
            // Multilingual fields
            'title_en'        => 'required|string|max:255',
            'title_ta'        => 'required|string|max:255',
            'description_en'  => 'nullable|string',
            'description_ta'  => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create the property
        $property = Property::create([
            'user_id'         => auth()->id(),
            'title'           => $request->input('title'),
            'description'     => $request->input('description'),
            'type'            => $request->input('type'),
            'location'        => $request->input('location'),
            'price'           => $request->input('price'),
            'size'            => $request->input('size'),
            'bedrooms'        => $request->input('bedrooms'),
            'bathrooms'       => $request->input('bathrooms'),
            'listing_type'    => $request->input('listing_type'),
            'category'        => $request->input('category'),
            'is_agent'        => $request->input('is_agent'),
            'title_en'        => $request->input('title_en'),
            'title_ta'        => $request->input('title_ta'),
            'description_en'  => $request->input('description_en'),
            'description_ta'  => $request->input('description_ta'),
        ]);

        return response()->json($property, 201);
    }

    // ✅ Show a specific property
    public function show($id)
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        return response()->json($property);
    }

    // ✅ Update an existing property
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'           => 'nullable|string|max:255',
            'description'     => 'nullable|string',
            'type'            => 'nullable|string',
            'location'        => 'nullable|string',
            'price'           => 'nullable|numeric',
            'size'            => 'nullable|numeric',
            'bedrooms'        => 'nullable|integer',
            'bathrooms'       => 'nullable|integer',
            'listing_type'    => 'nullable|string',
            'category'        => 'nullable|string',
            'is_agent'        => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $property->update($request->only([
            'title', 'description', 'type', 'location', 'price', 'size',
            'bedrooms', 'bathrooms', 'listing_type', 'category', 'is_agent'
        ]));

        return response()->json($property);
    }

    // ✅ Delete a property
    public function destroy($id)
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $property->delete();
        return response()->json(['message' => 'Property deleted successfully']);
    }

    // ✅ Admin: Approve a property listing and notify the user
    public function approveProperty($id)
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $property->status = 'approved';
        $property->save();

        // Notify the user
        $user = $property->user;
        $user->notify(new ListingApproved($property));

        return response()->json(['message' => 'Listing approved and user notified.']);
    }
}
