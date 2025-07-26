@extends('layouts.admin') {{-- यो layout तपाईंको dashboard layout हो --}}

@section('title', 'Resume List')

@section('content')
<div class="mb-4">
    <a href="{{ route('resumes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Create Resume</a>
</div>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3 text-left">Title</th>
            <th class="p-3 text-left">User</th>
            <th class="p-3 text-left">Template</th>
            <th class="p-3 text-left">Status</th>
            <th class="p-3 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($resumes as $resume)
        <tr class="border-t">
            <td class="p-3">{{ $resume->title }}</td>
            <td class="p-3">{{ $resume->user->name ?? 'N/A' }}</td>
            <td class="p-3">{{ $resume->template->name ?? 'N/A' }}</td>
            <td class="p-3">{{ ucfirst($resume->status) }}</td>
            <td class="p-3">
                <a href="{{ route('resumes.edit', $resume->resume_id) }}" class="text-blue-600">Edit</a>
                <form method="POST" action="{{ route('resumes.destroy', $resume->resume_id) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 ml-2" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="p-3 text-center text-gray-500">No resumes found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
