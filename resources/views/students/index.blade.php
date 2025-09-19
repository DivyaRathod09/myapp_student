@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Students</h3>
  <a href="{{ route('students.create') }}" class="btn btn-success">Add Student</a>
</div>

@if($students->count())
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Stream</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
      <tr>
        <td>{{ $loop->iteration + ($students->currentPage()-1)*$students->perPage() }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->mobile_no }}</td>
        <td>{{ $student->stream }}</td>
        <td>
          <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $students->links() }}
@else
  <div class="alert alert-info">No students found. <a href="{{ route('students.create') }}">Add one</a>.</div>
@endif
@endsection
