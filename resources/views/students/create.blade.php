@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">Add Student</div>
  <div class="card-body">
    <form action="{{ route('students.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Mobile No</label>
        <input type="text" name="mobile_no" value="{{ old('mobile_no') }}" class="form-control @error('mobile_no') is-invalid @enderror">
        @error('mobile_no')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Stream</label>
        <input type="text" name="stream" value="{{ old('stream') }}" class="form-control @error('stream') is-invalid @enderror">
        @error('stream')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <button class="btn btn-primary">Save</button>
      <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
@endsection
