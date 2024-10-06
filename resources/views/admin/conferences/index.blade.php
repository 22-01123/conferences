@extends('layouts.app')

@section('content')
    <h1>All Conferences</h1>
    <a href="{{ route('admin.conferences.create') }}">Create New Conference</a>
    <ul>
        @foreach($conferences as $conference)
            <li>
                <a href="{{ route('admin.conferences.edit', $conference->id) }}">
                    {{ $conference->title }} - {{ $conference->date }}
                </a>
                <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
