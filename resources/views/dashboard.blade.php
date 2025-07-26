@extends('layouts.admin')

@section('title', 'Welcome John')

@section('content')
<div class="bg-white rounded shadow p-6">
    <p class="text-lg font-medium">All systems are running smoothly!</p>
    <p>You have <a href="#" class="text-blue-600 underline">3 unread alerts!</a></p>
</div>
@endsection
