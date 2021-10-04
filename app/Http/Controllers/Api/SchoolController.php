<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::with('classes')->with('students')->get();

        return response()->json(['schools' => $schools]);
    }

    public function register(Request $request)
    {
        $school = School::create($request->all());

        return response()->json();
    }

    public function update(Request $request)
    {

        $school = School::find($request->id)->update($request->only('name', 'street'));

        return response()->json(['school' => $school]);
    }

    public function search(Request $request)
    {
        $schools = School::where('name', 'LIKE', '%' . $request->search . '%')->with('classes')->with('students')->get();
        return response()->json(['schools' => $schools]);
    }

    public function delete(School $id)
    {
        $id->delete();

        return response()->json();
    }
}