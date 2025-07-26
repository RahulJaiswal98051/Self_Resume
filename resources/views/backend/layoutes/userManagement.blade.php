@extends('backend.layoutes.master')

@section('content')
    <h2>User Management</h1>

    {{-- Display validation errors --}}
    <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
        <a href="{{ route('user-management.create') }}" class="btn btn-success">Add User</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            @if($user->profile)
                                <img src="{{ asset($user->profile) }}" alt="Profile Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <a href="{{ route('user-management.edit', $user->id) }}" class="btn btn-primary btn-sm" title="Edit" style="margin-right: 35px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('user-management.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this user?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection
