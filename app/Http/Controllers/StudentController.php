<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentRequest;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StudentRequest $request)
    {
        Student::create($request->validate());
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

}
