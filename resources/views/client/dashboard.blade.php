<!-- resources/views/client/dashboard.blade.php -->
@extends('layouts.app') <!-- Assuming you have a main layout -->

@section('content')
    <div class="container">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>

        <!-- Display any flash messages (optional) -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Client Dashboard Section -->
        <div class="card">
            <div class="card-header">
                Your Dashboard
            </div>
            <div class="card-body">
                <p>Hello, {{ Auth::user()->name }}! Here is a summary of your activity:</p>

                <!-- Conferences the client is registered for -->
                <h3>Your Registered Conferences</h3>
                @if ($conferences && $conferences->count() > 0)
                    <ul>
                        @foreach ($conferences as $conference)
                            <li>
                                <strong>{{ $conference->title }}</strong> - {{ $conference->date }} at {{ $conference->time }}<br>
                                Lecturer: {{ $conference->lecturer }}<br>
                                Address: {{ $conference->address }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>You are not registered for any conferences yet.</p>
                @endif

                <!-- Add any other client-specific information here -->
            </div>
        </div>
    </div>
@endsection
