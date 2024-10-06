@extends('layouts.app')

@section('content')
    <h1>{{ $conference->title }}</h1>
    <p>{{ $conference->description }}</p>
    <p>Date: {{ $conference->date }}</p>
    <p>Lecturer: {{ $conference->lecturer }}</p>

    <h2>Registered Clients</h2>
    <ul>
        @foreach($conference->registrations as $registration)
            <li>{{ $registration->user->name }} ({{ $registration->user->email }})</li>
        @endforeach
    </ul>
@endsection
