<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function GuzzleHttp\Promise\all;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return response()->json(['students' => $students]);
    }

    public function register(Request $request)
    {
        $student = Student::create($request->only('name', 'email', 'phone', 'birth', 'gender'));

        return response()->json(['user' => $student]);
    }

    public function update(Request $request)
    {
        $student = Student::find($request->id)->update($request->only('name', 'email', 'phone', 'birth', 'gender'));
        return response()->json(['aqui' => $student]);
    }

    public function search(Request $request)
    {
        $students = Student::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return response()->json(['students' => $students]);
    }

    public function delete(Student $id)
    {
        $id->delete();

        return response()->json();
    }
}