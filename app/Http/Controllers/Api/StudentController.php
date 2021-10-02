<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Student_Class;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function GuzzleHttp\Promise\all;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('school')->get();

        return response()->json(['students' => $students]);
    }

    public function register(Request $request)
    {
        $student = Student::create($request->only('school_id', 'name', 'email', 'phone', 'birth', 'gender'));

        if ($request->classesA) {
            foreach ($request->classesA as $classA) {
                $students_classes = Student_Class::create([
                    'student_id' => $student->id,
                    'class_id' => $classA['id'],
                ]);
            }
        }

        return response()->json(['student' => $student]);
    }

    public function update(Request $request)
    {
        $student = Student::find($request->id)->update($request->only('school_id', 'name', 'email', 'phone', 'birth', 'gender'));

        if ($request->classesA) {

            $delete_students_classes = Student_Class::where('student_id', $request->id)->delete();

            foreach ($request->classesA as $classA) {
                $students_classes = Student_Class::create([
                    'student_id' => $request->id,
                    'class_id' => $classA['id'],
                ]);
            }
        }

        return response()->json(['student' => $student]);
    }

    public function search(Request $request)
    {
        $students = Student::where('name', 'LIKE', '%' . $request->search . '%')->with('school')->get();

        return response()->json(['students' => $students]);
    }

    public function delete(Student $id)
    {
        $id->delete();

        return response()->json();
    }
}