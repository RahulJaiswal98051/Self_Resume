@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Personal Detail</h2>

    <form action="{{ route('personal.update', $detail->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" value="{{ $detail->full_name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $detail->email }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $detail->phone }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Address (optional)</label>
            <input type="text" name="address" value="{{ $detail->address }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
