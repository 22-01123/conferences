@extends('layouts.app')

@section('content')
    <h1>Create Conference</h1>
    <form method="POST" action="{{ route('admin.conferences.store') }}">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required>
        <label for="time">Time:</label>
        <input type="time" name="time" id="time" required>
        <label for="lecturer">Lecturer:</label>
        <input type="text" name="lecturer" id="lecturer" required>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>
        <button type="submit">Create Conference</button>
    </form>
@endsection
