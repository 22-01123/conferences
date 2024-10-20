@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }}. You are logged in as an Admin.</p>

        <div class="mt-4">
            <h3>Manage Conferences</h3>
            <a href="{{ route('conferences.index') }}" class="btn btn-primary">View Conferences</a>
            <a href="{{ route('conferences.create') }}" class="btn btn-success">Create New Conference</a>
        </div>

        <div class="mt-4">
            <h3>Manage Users</h3>
            <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a>
        </div>
    </div>
@endsection
