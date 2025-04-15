<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;

class RequirementController extends Controller
{
    public function index()
{
return Requirement::latest()->paginate(10);
}
public function store(Request $request)
{
$requirement = Requirement::create([
'user_id' => auth()->id(),
'need_type' => $request->need_type,
'desired_property_type' => $request->desired_property_type,
'preferred_location' => $request->preferred_location,
'budget' => $request->budget,
'additional_requirements' => $request->additional_requirements,
]);
return response()->json($requirement, 201);
}
public function show($id)
{
return Requirement::findOrFail($id);
}
public function update(Request $request, $id)
{
$req = Requirement::findOrFail($id);
$req->update($request->all());
return response()->json($req);
}
public function destroy($id)
{
Requirement::destroy($id);
return response()->json(['message' => 'Deleted']);
}
}
