<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::with('school')->get();

        return response()->json(['classes' => $classes]);
    }

    public function search(Request $request)
    {
        $classes = Classes::where('year', 'LIKE',  $request->search)->get();
        return response()->json(['students' => $request->search]);
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
}