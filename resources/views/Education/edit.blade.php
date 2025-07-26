@extends('layouts.app')

@section('content')
    <h2>Edit Education</h2>

    <form action="{{ route('education.update', $education->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" name="degree" class="form-control" value="{{ $education->degree }}" required>
        </div>

        <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <input type="text" name="institution" class="form-control" value="{{ $education->institution }}" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" value="{{ $education->year }}" required>
        </div>

        <div class="mb-3">
            <label for="percentage" class="form-label">Percentage</label>
            <input type="text" name="percentage" class="form-control" value="{{ $education->percentage }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('education.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
