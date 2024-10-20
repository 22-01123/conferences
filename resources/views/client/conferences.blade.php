@extends('layouts.app')

@section('content')
    <h1>Upcoming Conferences</h1>
    <ul>
        @foreach($conferences as $conference)
            <li>{{ $conference->title }} - {{ $conference->date }}
                <a href="{{ route('conferences.show', $conference->id) }}">View Details</a>
            </li>
        @endforeach
    </ul>
@endsection
