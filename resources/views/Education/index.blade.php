@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Education List</h2>
        <a href="{{ route('education.create') }}" class="btn btn-success">+ Add Education</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Degree</th>
                <th>Institution</th>
                <th>Year</th>
                <th>Percentage</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($educations as $education)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $education->degree }}</td>
                    <td>{{ $education->institution }}</td>
                    <td>{{ $education->year }}</td>
                    <td>{{ $education->percentage }}%</td>
                    <td>
                        <a href="{{ route('education.edit', $education->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        <form action="{{ route('education.destroy', $education->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No education records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
