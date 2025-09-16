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

    // public function store(StudentRequest $request)
    // {
    //     Student::create($request->validated());
    //     return redirect()->route('students.index')->with('success', 'Student added successfully.');
    // }

    public function store(StudentRequest $request)
    {
        $data = $request->validated();

        $student = Student::create($data);

        Log::info('New student created', [
            'id'        => $student->id,
            'name'      => $student->name,
            'email'     => $student->email,
            'mobile_no' => $student->mobile_no,
            'stream'    => $student->stream,
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

}
