<!-- resources/views/employee/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>

        <!-- Display any flash messages (optional) -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Employee Dashboard Section -->
        <div class="card">
            <div class="card-header">
                Your Dashboard
            </div>
            <div class="card-body">
                <p>Hello, {{ Auth::user()->name }}! Here is a summary of your tasks:</p>

                <!-- Add employee-specific information here -->
            </div>
        </div>
    </div>
@endsection
