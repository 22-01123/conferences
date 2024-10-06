@extends('layouts.app')

@section('content')
    <h1>Edit Conference</h1>
    <form method="POST" action="{{ route('admin.conferences.update', $conference->id) }}">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $conference->title }}" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ $conference->description }}</textarea>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="{{ $conference->date }}" required>
        <label for="time">Time:</label>
        <input type="time" name="time" id="time" value="{{ $conference->time }}" required>
        <label for="lecturer">Lecturer:</label>
        <input type="text" name="lecturer" id="lecturer" value="{{ $conference->lecturer }}" required>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="{{ $conference->address }}" required>
        <button type="submit">Update Conference</button>
    </form>
@endsection
