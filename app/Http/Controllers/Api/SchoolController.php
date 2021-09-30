<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();

        return response()->json(['schools' => $schools]);
    }

    public function register(Request $request)
    {
        $school = School::create($request->all());

        return response()->json();
    }
}