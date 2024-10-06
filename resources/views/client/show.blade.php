@extends('layouts.app')

@section('content')
    <h1>{{ $conference->title }}</h1>
    <p>{{ $conference->description }}</p>
    <p>Date: {{ $conference->date }}</p>
    <p>Lecturer: {{ $conference->lecturer }}</p>
    <p>Location: {{ $conference->address }}</p>

    <form method="POST" action="{{ route('conferences.register', $conference->id) }}">
        @csrf
        <button type="submit">Register for this Conference</button>
    </form>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @elseif (session('error'))
        <p>{{ session('error') }}</p>
    @endif
@endsection
