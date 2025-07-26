@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Personal Details</h2>
    <a href="{{ route('personal.create') }}" class="btn btn-primary mb-3">Add New</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
                <tr>
                    <td>{{ $detail->full_name }}</td>
                    <td>{{ $detail->email }}</td>
                    <td>{{ $detail->phone }}</td>
                    <td>{{ $detail->address }}</td>
                    <td>
                        <a href="{{ route('personal.edit', $detail->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('personal.destroy', $detail->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
