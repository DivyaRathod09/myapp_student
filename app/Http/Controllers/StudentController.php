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
        Student::create($request->validated());
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }


    public function destroy(Student $student)
    {
        try {
            $student->invalid_column_name;  

            $student->delete();

            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
        } catch (\Exception $e) {
            \Log::error("Delete Student Error: " . $e->getMessage());
            return redirect()->route('students.index')->with('error', 'Something went wrong while deleting student.');
        }
    }

}
