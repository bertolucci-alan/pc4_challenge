<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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

    public function editStudent()
    {
        return Inertia::render('Student/Update');
    }

    public function editClass()
    {
        return Inertia::render('Class/Update');
    }

    public function editSchool()
    {
        return Inertia::render('School/Update');
    }
}