<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\School;
use App\Models\Student_Class;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::with('school')->with('students')->get();

        return response()->json(['classes' => $classes]);
    }

    public function show($user, School $school)
    {
        $students_classes = Student_Class::where('student_id', $user)->delete();
        $classes = $school->classes()->get();

        return response()->json(['classE' => $classes]);
    }

    public function search(Request $request)
    {
        $classes = Classes::where('year', 'LIKE', '%' . $request->search . '%')->with('school')->get();

        return response()->json(['classes' => $classes]);
    }

    public function register(Request $request)
    {
        $class = Classes::create($request->all());

        return response()->json(['class' => $class]);
    }

    public function update(Request $request)
    {
        $class = Classes::find($request->id)->update($request->only('year', 'level', 'grade', 'day'));

        return response()->json(['class' => $class]);
    }

    public function delete(Classes $id)
    {
        $id->delete();

        return response()->json();
    }
}