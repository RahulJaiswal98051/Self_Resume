@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add Personal Detail</h2>

    <form action="{{ route('personal.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Address (optional)</label>
            <input type="text" name="address" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
