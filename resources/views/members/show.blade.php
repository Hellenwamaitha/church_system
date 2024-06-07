
@extends('layouts.app')

@section('content')
<h1>Member Details</h1>

<div style="display: table; width: 100%;">
    <div style="display: table-row;">
        <div style="display: table-cell; font-weight: bold;">First Name:</div>
        <div style="display: table-cell;">{{ $member->first_name }}</div>
    </div>
    <div style="display: table-row;">
        <div style="display: table-cell; font-weight: bold;">Last Name:</div>
        <div style="display: table-cell;">{{ $member->last_name }}</div>
    </div>
    <div style="display: table-row;">
        <div style="display: table-cell; font-weight: bold;">Email:</div>
        <div style="display: table-cell;">{{ $member->email }}</div>
    </div>
    <div style="display: table-row;">
        <div style="display: table-cell; font-weight: bold;">Phone Number:</div>
        <div style="display: table-cell;">{{ $member->phone_number }}</div>
    </div>
    <div style="display: table-row;">
        <div style="display: table-cell; font-weight: bold;">Address:</div>
        <div style="display: table-cell;">{{ $member->address }}</div>
    </div>
    <div style="display: table-row;">
        <div style="display: table-cell; font-weight: bold;">Membership Status:</div>
        <div style="display: table-cell;">{{ $member->membership_status }}</div>
    </div>
    <div style="display: table-row;">
        <div style="display: table-cell; font-weight: bold;">Created Date:</div>
        <div style="display: table-cell;">{{ $member->created_at }}</div>
    </div>
</div>

<a href="{{ route('members.index') }}" class="btn btn-primary">Back to Members List</a>


@endsection
