@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Resume</h2>
    <form action="{{ route('resume.update', $resume->resume_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $resume->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>User ID</label>
            <input type="number" name="user_id" value="{{ $resume->user_id }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Templet ID</label>
            <input type="number" name="templet_id" value="{{ $resume->templet_id }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $resume->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $resume->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
