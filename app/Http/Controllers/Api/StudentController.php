<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function register(Request $request)
    {
        $student = Student::create($request->only('name', 'email', 'phone', 'birth', 'gender'));

        return response()->json(['user' => $student]);
    }
}