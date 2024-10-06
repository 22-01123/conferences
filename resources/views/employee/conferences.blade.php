@extends('layouts.app')

@section('content')
    <h1>All Conferences</h1>
    <ul>
        @foreach($conferences as $conference)
            <li>
                <a href="{{ route('employee.conferences.show', $conference->id) }}">
                    {{ $conference->title }} - {{ $conference->date }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
