@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1><strong>Financial Reports Overview</strong></h1>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addReportModal" style="float: right;">
                Add Financial Report
            </button>
        </div>

        <form action="{{ route('financialreport.filter') }}" method="GET" class="mb-4">
            <div class="input-group">
                <select name="period" class="form-select" aria-label="Select period">
                    <option value="quarterly">Quarterly</option>
                    <option value="semiannually">Semi-Annually</option>
                </select>
                <button class="btn btn-primary" type="submit">Filter</button>
            </div>
        </form>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Offerings</h5>
                        <p class="card-text">${{ number_format($totalOfferings, 2) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Tithes</h5>
                        <p class="card-text">${{ number_format($totalTithes, 2) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Income</h5>
                        <p class="card-text">${{ number_format($totalIncome, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Total Offerings</th>
                    <th>Total Tithes</th>
                    <th>Total Income</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($financialReports as $report)
                    <tr>
                        <td>{{ $report->total_offerings }}</td>
                        <td>{{ $report->total_tithes }}</td>
                        <td>{{ $report->total_income }}</td>
                        <td>
                            {{-- <a href="{{ route('#', $report->id) }}" class="btn btn-info">View</a> --}}
                            {{-- <a href="{{ route('#', $report->id) }}" class="btn btn-primary">Edit</a> --}}
                            {{-- <form action="{{ route('#', $report->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addReportModal" tabindex="-1" aria-labelledby="addReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReportModalLabel">Add Financial Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addReportForm" method="POST" action="{{ route('financialreport.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="total_offerings" class="form-label">Total Offerings</label>
                            <input type="number" class="form-control" id="total_offerings" name="total_offerings" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_tithes" class="form-label">Total Tithes</label>
                            <input type="number" class="form-control" id="total_tithes" name="total_tithes" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_income" class="form-label">Total Income</label>
                            <input type="number" class="form-control" id="total_income" name="total_income" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Report</button>
                    </form>
                </div>
            </div>
        </div>
@endsection


