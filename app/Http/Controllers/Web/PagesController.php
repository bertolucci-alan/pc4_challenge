<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function home()
    {
        return Inertia::render('Home');
    }

    public function students()
    {
        return Inertia::render('Student/List');
    }

    public function classes()
    {
        return Inertia::render('Class/List');
    }

    public function schools()
    {
        return Inertia::render('School/List');
    }

    public function editStudent($name, Student $id)
    {
        $classE = Classes::where('school_id', '=', $id->school_id)->get();
        $classA = $id->classes()->get();

        return Inertia::render('Student/Update', [
            'student' => $id,
            'classE' => $classE,
            'classA' => $classA,
        ]);
    }

    public function editClass(Classes $id)
    {
        $students = $id->students()->get();

        return Inertia::render('Class/Update', [
            'classes' => $id,
            'students' => $students,
        ]);
    }

    public function editSchool($name, School $id)
    {
        $classes = $id->classes()->get();

        return Inertia::render('School/Update', [
            'school' => $id,
            'classes' => $classes,
        ]);
    }

    public function registerStudent()
    {
        return Inertia::render('Student/Register');
    }

    public function registerClass()
    {
        return Inertia::render('Class/Register');
    }

    public function registerSchool()
    {
        return Inertia::render('School/Register');
    }
}