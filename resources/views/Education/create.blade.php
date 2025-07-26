@extends('layouts.app')

@section('content')
    <h2>Add New Education</h2>

    <form action="{{ route('education.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" name="degree" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <input type="text" name="institution" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="percentage" class="form-label">Percentage</label>
            <input type="text" name="percentage" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('education.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
