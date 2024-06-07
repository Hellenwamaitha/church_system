<!-- resources/views/events/index.blade.php -->
@extends('layouts.app')

@section('content')

<div class="row justify-content-end">
    <div class="col-auto">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
            Add New Event
        </button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Events List</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" name="table_search" class="form-control" placeholder="Search">
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Actions</th> <!-- New column for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->time }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <!-- Edit Action -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->id }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>

                                <!-- Delete Action -->
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>

                                <!-- Print Action (Example) -->
                                {{-- <a href="{{ route('events.print', $event->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-print"></i> Print
                                </a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Event Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('events.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="event-title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="event-title" name="title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="event-date" class="col-sm-2 col-form-label">Date:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="event-date" name="date" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="event-time" class="col-sm-2 col-form-label">Time:</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="event-time" name="time" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="event-location" class="col-sm-2 col-form-label">Location:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="event-location" name="location" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Event Modals -->
@foreach ($events as $event)
@include('components.event.edit', ['event' => $event])
@endforeach

@endsection
