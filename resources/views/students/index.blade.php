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
      </tr>
    @endforeach
  </tbody>
</table>
{{ $students->links() }}
@else
  <div class="alert alert-info">No students found. <a href="{{ route('students.create') }}">Add one</a>.</div>
@endif
@endsection
