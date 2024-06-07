<!-- resources/views/events/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Event</h2>
        <form method="POST" action="{{ route('events.update', $event->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Event Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $event->description }}</textarea>
            </div>
            <!-- Add more form fields as needed -->
            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
@endsection
