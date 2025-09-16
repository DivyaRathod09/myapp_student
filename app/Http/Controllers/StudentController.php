<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Log;


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
    try {
        $data = $request->validated();

        // ✅ This line is correct
        $student = Student::create($data);

        // ❌ Intentional error (calling undefined function)
        $student->someUndefinedMethod();

        Log::info('New student created', [
            'id'        => $student->id,
            'name'      => $student->name,
            'email'     => $student->email,
            'mobile_no' => $student->mobile_no,
            'stream'    => $student->stream,
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    } catch (\Exception $e) {
        // This will catch the error and log it
        Log::error('Error while creating student', [
            'message' => $e->getMessage(),
            'trace'   => $e->getTraceAsString(),
        ]);

        return redirect()->back()->with('error', 'Something went wrong! Check logs.');
    }
}


}
